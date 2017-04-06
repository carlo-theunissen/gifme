<?php
namespace VideoUploadBundle\Validators;

use Oneup\UploaderBundle\Event\ValidationEvent;
use Oneup\UploaderBundle\Uploader\Exception\ValidationException;

class AlwaysFalseValidationListener
{
    public function onValidate(ValidationEvent $event)
    {
        $config  = $event->getConfig();
        $file    = $event->getFile();
        $type    = $event->getType();
        $request = $event->getRequest();

        // do some validations
        throw new ValidationException('Sorry! Always false.');
    }
}
?>