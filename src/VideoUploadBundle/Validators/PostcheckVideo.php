<?php
namespace VideoUploadBundle\Validators;
use VideoUploadBundle\DependencyInjection\FFProbe;
use Oneup\UploaderBundle\Event\PostPersistEvent;
class PostcheckVideo
{
    private $ffprobeService;
    private $acceptedFormats;
    public function __construct(FFProbe $ffprobe, $acceptedFormats){
        $this->ffprobeService  = $ffprobe;
        $this->acceptedFormats = $acceptedFormats;
    }

    public function onUpload(PostPersistEvent $event)
    {
        $response = $event->getResponse();
        $info = $this->ffprobeService->getFileInfo($event->getFile()->getPathname());

        if(!isset($info['streams'])){
            $response['success'] = false;
            return $response;
        }
        $response['success'] = $this->hasValidStream($info['streams']);
        return $response;
    }

    private function hasValidStream($streams){
        foreach($streams as &$stream){
            if(isset($stream['codec_name']) && in_array($stream['codec_name'], $this->acceptedFormats ) ){
                return true;
            }
        }

        return false;
    }
}
