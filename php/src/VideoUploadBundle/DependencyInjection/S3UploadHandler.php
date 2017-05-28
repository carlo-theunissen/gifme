<?php
/**
 * Created by PhpStorm.
 * User: CARLO
 * Date: 12-4-2017
 * Time: 15:35
 */

namespace VideoUploadBundle\DependencyInjection;


use Oneup\UploaderBundle\Uploader\File\FileInterface;
use VideoUploadBundle\Interfaces\IS3Bucket;
use VideoUploadBundle\Interfaces\IUploadHelper;

class S3UploadHandler implements IUploadHelper
{
    /**
     * @var IS3Bucket
     */
    private $bucket;
    public function __construct( IS3Bucket $bucket){
        $this->bucket = $bucket;
    }
    public function upload(FileInterface $file, $name){
        //TODO: connect to database and store the name
        $this->bucket->UploadToBucket($file, "offered/".$name);
    }

}