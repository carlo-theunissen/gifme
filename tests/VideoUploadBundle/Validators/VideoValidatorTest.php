<?php
/**
 * Created by PhpStorm.
 * User: CARLO
 * Date: 7-4-2017
 * Time: 10:36
 */

namespace Tests\VideoUploadBundle\Validators;


use Oneup\UploaderBundle\Event\ValidationEvent;
use Oneup\UploaderBundle\Uploader\Exception\ValidationException;
use Oneup\UploaderBundle\Uploader\File\FileInterface;
use Symfony\Component\HttpFoundation\Request;
use VideoUploadBundle\Tests\AbstractTest;
use VideoUploadBundle\Validators\VideoValidator;

class VideoValidatorTest extends AbstractTest
{

    public function testCorrectSize(){


        $file = new FakeFile();
        $file->setSize(20 * 1024 * 1024); //20mb

        $this->checkValidation($file);

    }

    public function testWrongSize(){
        $this->expectException(ValidationException::class);
        $file = new FakeFile();
        $file->setSize(20 * 1024 * 1024 + 1); //20mb

        $this->checkValidation($file);
    }

    private function checkValidation(FileInterface $file){
        $event = new ValidationEvent($file, new Request(), [], '');

        $kernel = $this->GetKernel();
        /** @var VideoValidator $validator */
        $validator = $kernel->getContainer()->get('video_upload.video_validator');
        $validator->onValidate($event);
    }
}
