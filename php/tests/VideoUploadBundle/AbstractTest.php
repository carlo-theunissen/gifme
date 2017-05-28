<?php

namespace VideoUploadBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractTest extends WebTestCase
{
    /**
     * @return \Symfony\Bundle\FrameworkBundle\Client
     */
	protected function GetClient(){
        return static::createClient($this->getSettings());
	}

    /**
     * @return \Symfony\Component\HttpKernel\KernelInterface
     */
    protected function GetKernel(){
        $kernel = static::createKernel($this->getSettings());
        $kernel->boot();
        return $kernel;
    }

    private function getSettings(){
		return array(
            'environment' => 'test_' . (getenv("ENVIORMENT")?: 'dev')
        );
    }

}
