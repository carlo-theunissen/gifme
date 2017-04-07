<?php
namespace VideoUploadBundle\Validators;


use Oneup\UploaderBundle\Event\ValidationEvent;
use Oneup\UploaderBundle\Uploader\Exception\ValidationException;

class VideoValidator
{

    /**
     * @param ValidationEvent $event
     */
    public function onValidate(ValidationEvent $event)
    {

        $file    = $event->getFile();
        if($file->getSize() > 20 * 1024 * 1024){
            throw new ValidationException('filesize_to_big');
        }
    }

}
