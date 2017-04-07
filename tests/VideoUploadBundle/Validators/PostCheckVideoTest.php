<?php
/**
 * Created by PhpStorm.
 * User: CARLO
 * Date: 7-4-2017
 * Time: 11:50
 */

namespace Tests\VideoUploadBundle\Validators;


use Oneup\UploaderBundle\Event\PostPersistEvent;
use Oneup\UploaderBundle\Uploader\File\FileInterface;
use Oneup\UploaderBundle\Uploader\Response\EmptyResponse;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpFoundation\Request;
use VideoUploadBundle\Tests\AbstractTest;
use VideoUploadBundle\Validators\PostcheckVideo;

class PostCheckVideoTest extends AbstractTest
{
    public function testCorrectFiles(){

        $kernel = $this->GetKernel();
        $this->checkFolder($kernel->getRootDir().'/../tests/Resources/allowed/');

    }


    public function testFailFiles(){

        $kernel = $this->GetKernel();
        $this->checkFolder($kernel->getRootDir().'/../tests/Resources/disallowed/', false);
    }

    private function checkFolder($folder, $shouldSucceed = true){
        $finder = new Finder();

        $finder->files()->in($folder);

        foreach ($finder as $file) {
            $usedFile = new FakeFile($file);
            $response = $this->checkFile($usedFile);
            if($shouldSucceed){
                $this->assertTrue($response['success'], $file->getPathname() .' Failed');
            } else {
                $this->assertFalse($response['success'], $file->getPathname() .' Succeeded, but shoudn\'t');
            }

        }
    }

    /**
     * @param FileInterface $file
     * @return EmptyResponse
     */
    private function checkFile(FileInterface $file){
        $kernel = $this->GetKernel();

        /** @var PostcheckVideo $validator */
        $validator = $kernel->getContainer()->get('video_upload.post_video_validator');
        $response = new EmptyResponse();
        $event = new PostPersistEvent($file, $response, new Request(), '', []);
        $validator->onUpload($event);

        return $response;
    }
}