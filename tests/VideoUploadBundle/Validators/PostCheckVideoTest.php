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
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use VideoUploadBundle\Tests\AbstractTest;

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

    /**
     * Tests a given folder for correct or incorrect files.
     *  It checks if:
     *  - The file is valid for uploading or not
     *  - If the returned id is valid
     *  - If the file is deleted after processing
     * @param $folder
     * @param bool $shouldSucceed
     */
    private function checkFolder($folder, $shouldSucceed = true){
        $finder = new Finder();

        $finder->files()->in($folder);

        foreach ($finder as $file) {
            $usedFile = new FakeFile($file);
            $response = $this->checkFile($usedFile, $folder.'temp/');

            if($shouldSucceed){
                $this->assertTrue($response['success'], $file->getPathname() .' Failed');
                $this->assertRegExp('/\d+/', (string) $response['id'], 'Invalid Id: ' .$response['id']);
                $this->assertTrue($response['uploaded'], "Didn't upload the file");
            } else {
                $this->assertFalse($response['success'], $file->getPathname() .' Succeeded, but shouldn\'t');
                $this->assertFalse(isset($response['id']), "Id is giving, but is not allowed");
                $this->assertFalse($response['uploaded'], "Did upload a file, but shouldn't");
            }


            $this->assertTrue($response['deleted'], $file->getPathname() ." Didn't clean up");

        }
    }

    /**
     * @param FileInterface $file
     * @param $tempDir
     * @return EmptyResponse
     */
    private function checkFile(FileInterface $file, $tempDir){

        $fs = new Filesystem();
        $fs->mkdir($tempDir);
        $fs->copy($file->getPathname(), $tempDir .$file->getBasename());

        $fake = FakeFile::copy($file);
        $fake->setPathname($tempDir.$file->getBasename());

        $kernel = $this->GetKernel();

        $uploader = new TestUploadHandler();

        $kernel->getContainer()->set('video_upload.upload_handler', $uploader );
        $validator = $kernel->getContainer()->get('video_upload.post_video_validator');

        $response = new EmptyResponse();
        $event = new PostPersistEvent($fake, $response, new Request(), '', []);
        $validator->onUpload($event);

        $response['deleted'] = !$fs->exists($fake->getPathname());
        $response['uploaded'] = $uploader->didCall();

        $fs->remove($fake->getPathname());
        return $response;
    }


}