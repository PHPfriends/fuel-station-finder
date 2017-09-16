<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Controller\BaseController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BaseControllerTest extends WebTestCase
{
    public function testGetUploadDir()
    {
        $baseController = new BaseController();
        $result = $baseController->getUploadDir();

        $this->assertEquals("Fuel", $result);
    }
}