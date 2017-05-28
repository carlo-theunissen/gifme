<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 19-4-2017
 * Time: 11:16
 */

namespace Tests\VideoUploadBundle\Validators;


use Oneup\UploaderBundle\Uploader\File\FileInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use VideoUploadBundle\Interfaces\IUploadHelper;

class TestUploadHandler implements IUploadHelper
{
    private $call = false;
    public function didCall(){
        return $this->call;
    }
    public function upload(FileInterface $file, $newName)
    {
        $fs = new Filesystem();
        if(!$fs->exists($file->getPathname())){
            throw new IOException("File not found");
        }
        $fs->touch($file->getPathname()); //check if we can modify a file
        $this->call = true;
    }

}