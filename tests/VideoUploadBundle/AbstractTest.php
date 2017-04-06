<?php

namespace VideoUploadBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractTest extends WebTestCase
{
	protected function GetClient(){
        return static::createClient($this->getSettings());
	}

    protected function GetKernel(){
        $kernel = static::createKernel($this->getSettings());
        $kernel->boot();
        return $kernel;
    }

    private function getSettings(){
		return array(
            'environment' => getenv("ENVIORMENT")?: 'test'
        );
    }

}
