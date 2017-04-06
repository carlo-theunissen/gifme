<?php

namespace VideoUploadBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use VideoUploadBundle\Tests\AbstractTest;

class DefaultControllerTest extends AbstractTest
{
    /**
     * @dataProvider urlProvider
     */
    public function testRoutes($url)
    {
        $client = $this->GetClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return array(
            array('/upload'),
        );
    }

}
