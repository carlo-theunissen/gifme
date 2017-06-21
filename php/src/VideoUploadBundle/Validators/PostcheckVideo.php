<?php
namespace VideoUploadBundle\Validators;
use Oneup\UploaderBundle\Uploader\File\FileInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Process\ProcessBuilder;
use VideoUploadBundle\DependencyInjection\FFProbe;
use Oneup\UploaderBundle\Event\PostPersistEvent;
use VideoUploadBundle\Interfaces\IUploadHelper;

class PostcheckVideo
{
    private $ffprobeService;
    private $acceptedFormats;
    private $uploadHandler;
    public function __construct(FFProbe $ffprobe, $acceptedFormats, IUploadHelper $handler){
        $this->ffprobeService  = $ffprobe;
        $this->acceptedFormats = $acceptedFormats;
        $this->uploadHandler = $handler;
    }

    public function onUpload(PostPersistEvent $event)
    {
        $info = $this->ffprobeService->getFileInfo($event->getFile()->getPathname());

        $out = $event->getResponse();
        if(!isset($info['streams'])){
            $out['success'] = false;
            $this->removeFile($event->getFile());
            return $out;
        }

        $out['success'] = $this->hasValidStream($info['streams']);

        if($out['success']) {
            $out['id'] = $this->handleUpload($event->getFile());
        }
        $this->removeFile($event->getFile());
        return $out;
    }

    /**
     * @param File $file
     * @return int
     */
    private function handleUpload(File $file){
        $name = time() . ""  . mt_rand();
        $this->uploadHandler->upload($file, $name . '.'. $file->getExtension());
        return $name;
    }

    private function removeFile(File $file){
        gc_collect_cycles(); //yep this is needed otherwise it won't work

        //use the rm command because we don't have the rights to delete it through php.
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
