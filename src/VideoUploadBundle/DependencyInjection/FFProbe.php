<?php
namespace VideoUploadBundle\DependencyInjection;
use Symfony\Component\Process\ProcessBuilder;

class FFProbe
{
    private $prefix;
    public function __construct($prefix){
        $this->prefix = $prefix;
    }

    public function getFileInfo($url){
        $builder = new ProcessBuilder();
        $builder->setPrefix($this->prefix);
        $builder->setArguments(array('-loglevel', 'quiet', '-show_format', '-print_format', 'json'));
        $builder->setInput($url);

        $builder->getProcess()->run();
        if(!$builder->getProcess()->isSuccessful()){
            return null;
        }

        return $this->processOutput($builder->getProcess()->getOutput());
    }
    private function processOutput($output){
        $json = json_decode($output);
        if(!isset($json['format']) && !isset($json['streams'])){
            return null;
        }
        return $json;
    }


}