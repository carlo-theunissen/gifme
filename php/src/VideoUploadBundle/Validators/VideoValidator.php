<?php
namespace VideoUploadBundle\Validators;


use Oneup\UploaderBundle\Event\ValidationEvent;
use Oneup\UploaderBundle\Uploader\Exception\ValidationException;

class VideoValidator
{
    private $maxFileSize;
    public function __construct($maxFileSize)
    {
        $this->maxFileSize = $maxFileSize;
    }

    /**
     * @param ValidationEvent $event
     */
    public function onValidate(ValidationEvent $event)
    {

        $file    = $event->getFile();
        if($file->getSize() > $this->maxFileSize * 1024 * 1024){
            throw new ValidationException('filesize_to_big');
        }
    }

}
