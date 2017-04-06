<?php
namespace VideoUploadBundle\Validators;

use VideoUploadBundle\DependencyInjection;
use Oneup\UploaderBundle\Event\ValidationEvent;
use Oneup\UploaderBundle\Uploader\Exception\ValidationException;

class VideoValidator
{
    private $ffprobeService;
    private $acceptedFormats;

    public function __construct(FFProbe $ffprobe, $acceptedFormats){
        $this->ffprobeService  = $ffprobe;
        $this->acceptedFormats = $acceptedFormats;
    }
    public function onValidate(ValidationEvent $event)
    {

        $file    = $event->getFile();
        if($file->getSize() > 20 * 1024 * 1024){
            throw new ValidationException('filesize_to_big');
        }

        $info = $this->ffprobeService->getFileInfo($file->getPath());
        if($info == null){
            throw new ValidationException('unknown_file');
        }

        if($info['format']['size'] >  20 * 1024 * 1024 ){
            throw new ValidationException('filesize_to_big');
        }
        if(!$this->hasValidStream($info['streams'])){
            throw new ValidationException('invalid_streams');
        }
    }
    private function hasValidStream($streams){
        foreach($streams as &$stream){
            if(isset($stream['codec_name']) && isset($stream['duration']) && $stream['duration'] > 0 && array_key_exists($stream['codec_name'], $this->acceptedFormats)){
                return true;
            }
        }
        return false;
    }
}
