<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    /**
     * @Rest\Get("/search/{fuel}/{latitud}/{longitud}")
     */
    public function getAction($fuel, $latitud, $longitud)
    {
        //$latitud = '42,846028';
        //$longitud = '-2,509361';
        //http://fuel.dev/app_dev.php/search/G95/42,846028/-2,509361

        //$root = dirname(__FILE__)."/../../../web/Fuel/$fuel.json";
        $root = $this->getUploadedRootDir(). "/". $fuel . ".json";
        $jsonitem = $this->getContent($root);

        $objitems = json_decode($jsonitem);
        $findBy = function($latitud, $longitud) use ($objitems) {
            foreach ($objitems as $friend) {
                if ($friend->latitud == $latitud && $friend->longitud == $longitud){
                    return $friend;
                }
            }

            return new \stdClass();
        };

        $result = get_object_vars($findBy($latitud, $longitud));

        return $result;
    }
}
