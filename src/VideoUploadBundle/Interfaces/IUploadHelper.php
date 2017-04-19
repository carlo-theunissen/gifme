<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 19-4-2017
 * Time: 10:50
 */

namespace VideoUploadBundle\Interfaces;


use Oneup\UploaderBundle\Uploader\File\FileInterface;

interface IUploadHelper
{
    public function upload(FileInterface $file, $newName);
}