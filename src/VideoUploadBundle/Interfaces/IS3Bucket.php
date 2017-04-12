<?php
namespace VideoUploadBundle\Interfaces;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Created by PhpStorm.
 * User: CARLO
 * Date: 12-4-2017
 * Time: 12:46
 */
interface IS3Bucket
{
    public function UploadToBucket(File $info, $name);
}