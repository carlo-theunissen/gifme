<?php
/**
 * Created by PhpStorm.
 * User: CARLO
 * Date: 12-4-2017
 * Time: 16:18
 */

namespace VideoUploadBundle\DependencyInjection;


use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Process\ProcessBuilder;
use VideoUploadBundle\Interfaces\IS3Bucket;

class CLIS3Bucket implements IS3Bucket
{
    private $bucket;
    private $region;
    public function __construct($region, $bucket){
        $this->region = $region;
        $this->bucket = $bucket;
    }

    public function UploadToBucket(File $info, $name)
    {
        $builder = new ProcessBuilder();
        $builder->setPrefix('aws');
        $builder->setArguments(['s3', 'cp', $info->getPathname(), 's3://'.$this->bucket.'/'.$name, '--region', $this->region]);
        echo $builder->getProcess()->getCommandLine();
        $builder->getProcess()->mustRun();

    }
}