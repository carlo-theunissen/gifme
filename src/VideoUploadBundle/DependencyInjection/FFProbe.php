<?php
namespace VideoUploadBundle\DependencyInjection;
use Symfony\Component\Process\ProcessBuilder;

class FFProbe
{
    private $prefix;
    public function __construct($prefix){
        $this->prefix = $prefix;
    }

    /**
     * @param $url
     * @return json|null
     */
    public function getFileInfo($url){
        $builder = new ProcessBuilder();
        $builder->setPrefix($this->prefix);
        $builder->setArguments(array('-show_streams', '-select_streams', 'v', '-loglevel',  'quiet', '-show_format', '-print_format', 'json', '--', $url));
        $builder->setInput($url);
        $process = $builder->getProcess();
        $process->run();
        if(!$process->isSuccessful()){
            return null;
        }
        return $this->processOutput($process->getOutput());
    }
    private function processOutput($output){
        $json = json_decode($output,true);
        if(!isset($json['format']) && !isset($json['streams'])){
            return null;
        }
        return $json;
    }


}