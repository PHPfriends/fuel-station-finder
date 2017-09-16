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
        $result = $testDefaultController->getAction("G95", "42,846028", "-2,509361");
        $this->assertEquals(array(), $result );
    }
}
