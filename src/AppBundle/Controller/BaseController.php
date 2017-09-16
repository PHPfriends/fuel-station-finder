<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class BaseController extends FOSRestController
{

    public function getUploadDir()
    {
        return "Fuel";
    }

    protected function getUploadedRootDir()
    {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    protected function getContent($file)
    {
        $content = file_get_contents($file);
        if ($content === false) {
            throw new Exception( 'Something really gone wrong');
        }

        return $content;
    }
}