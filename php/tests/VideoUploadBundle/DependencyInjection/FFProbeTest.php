<?php

namespace Tests\VideoUploadBundle\DependencyInjection;

use VideoUploadBundle\Tests\AbstractTest;

class FFProbeTest extends AbstractTest
{
    private function getFFProbe($kernel){
        return $kernel->getContainer()->get('video_upload.ffprobe');

    }

    /**
     * @group travis
     * @group dev
     */
    public function testFFProbeInfo(){


        $kernel = $this->GetKernel();
        $ffprobe = $this->getFFProbe($kernel);
        $info = $ffprobe->getFileInfo($kernel->getRootDir().'/../tests/Resources/allowed/travis.avi');


        if($info === null){
            $this->fail('Info is null');
            return;
        }

        if(!isset($info['streams'][0]['codec_name'])){
            $this->fail('Codec is not provided');
            return;
        }

        $this->assertTrue($info['streams'][0]['codec_name'] === "mpeg4");
    }

    public function testFFProbeFail(){
        $kernel = $this->GetKernel();
        $ffprobe = $this->getFFProbe($kernel);
        $info = $ffprobe->getFileInfo('');

        $this->assertTrue($info === null);
    }
}
