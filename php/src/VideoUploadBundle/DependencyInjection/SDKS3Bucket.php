<?php
/**
 * Created by PhpStorm.
 * User: CARLO
 * Date: 12-4-2017
 * Time: 12:45
 */

namespace VideoUploadBundle\DependencyInjection;


use Aws\S3\S3Client;
use Oneup\UploaderBundle\Uploader\File\FileInterface;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpFoundation\File\File;
use VideoUploadBundle\Interfaces\IS3Bucket;

class SDKS3Bucket implements IS3Bucket
{
    private $s3Client;
    private $bucket;
    public function __construct($region, $key, $secret, $bucket){
        $this->s3Client = new S3Client([
            'version' => 'latest',
            'region' => $region,
            'credentials' => [
                'key' => $key,
                'secret' => $secret
            ]
        ]);

        $this->bucket = $bucket;
    }

    public function UploadToBucket(File $info, $name)
    {
/*        $this->s3Client->putObject(array(
            'Bucket'       => $this->bucket,
            'Key'          => $name,
            'SourceFile'   => $info->getPathname(),
            'ContentType'  => $info->getMimeType(),
            'ACL'          => 'bucket-owner-full-control',
        ));
*/
    }
}