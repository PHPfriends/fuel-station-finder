<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{


    /*public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }*/

    public function testGetAction()
    {
        $testDefaultController = new DefaultController();
        $result = $testDefaultController->getAction("G95", "39.43705", "-0.46546");
        //$this->assertEquals(array(), $result );
        //$this->assertArrayHasKey('address', $result);
        //dump(count($result));
        $this->assertInternalType('array',$result);
        $this->assertGreaterThan(1, $result);

    }
}
