<?php
/**
 * Created by PhpStorm.
 * User: CARLO
 * Date: 12-4-2017
 * Time: 15:35
 */

namespace VideoUploadBundle\DependencyInjection;


use Symfony\Component\HttpFoundation\File\File;
use VideoUploadBundle\Interfaces\IS3Bucket;

class UploadHandler
{
    /**
     * @var IS3Bucket
     */
    private $bucket;
    public function __construct( IS3Bucket $bucket){
        $this->bucket = $bucket;
    }
    public function uploadToS3(File $file){
        //TODO: connect to database and store the name
        $this->bucket->UploadToBucket($file, "offered/".rand().'.'.$file->getExtension());
    }

}