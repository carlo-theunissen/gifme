<?php
namespace VideoUploadBundle\Validators;
use Oneup\UploaderBundle\Uploader\File\FileInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Process\ProcessBuilder;
use VideoUploadBundle\DependencyInjection\FFProbe;
use Oneup\UploaderBundle\Event\PostPersistEvent;
use VideoUploadBundle\DependencyInjection\UploadHandler;
use VideoUploadBundle\Interfaces\IS3Bucket;

class PostcheckVideo
{
    private $ffprobeService;
    private $acceptedFormats;
    private $uploadHandler;
    public function __construct(FFProbe $ffprobe, $acceptedFormats, UploadHandler $handler){
        $this->ffprobeService  = $ffprobe;
        $this->acceptedFormats = $acceptedFormats;
        $this->uploadHandler = $handler;
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

        if($response['success']) {
            $this->uploadHandler->uploadToS3($event->getFile());
        }
        $this->removeFile($event->getFile());
        return $response;
    }

    private function removeFile(File $file){
        gc_collect_cycles(); //yep this is needed otherwise it it won't work
        $command = new ProcessBuilder();
        $command->setPrefix('rm');
        $command->setArguments(['-f', $file->getPathname()]);
        $command->getProcess()->mustRun();
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
