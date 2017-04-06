<?php

namespace VideoUploadBundle\Tests\Controller;

use VideoUploadBundle\Tests\AbstractTest;

class FFProbeTest extends AbstractTest
{
    private function getFFProbe($kernel){
        return $kernel->getContainer()->get('video_upload.ffprobe');

    }

    public function testFFProbeInfo(){

        $kernel = $this->GetKernel();
        $ffprobe = $this->getFFProbe($kernel);
        $info = $ffprobe->getFileInfo($kernel->getRootDir().'/../tests/Resources/vid1.mp4');

        echo $kernel->getRootDir().'/../tests/Resources/vid1.mp4';

        if($info === null){
            $this->fail('Info is null');
            return;
        }

        if(!isset($info['streams'][0]['codec_name'])){
            $this->fail('Coded is not provided');
            return;
        }

        $this->assertTrue($info['streams'][0]['codec_name'] === "h264");
    }

    public function testFFProbeFail(){
        $kernel = $this->GetKernel();
        $ffprobe = $this->getFFProbe($kernel);
        $info = $ffprobe->getFileInfo('');

        $this->assertTrue($info === null);
    }
}
