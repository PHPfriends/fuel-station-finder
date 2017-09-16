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

        $latitud = floatval(str_replace(',', '.', $latitud));
        $longitud = floatval(str_replace(',', '.', $longitud));

        //$root = dirname(__FILE__)."/../../../web/Fuel/$fuel.json";
        $root = $this->getUploadedRootDir(). "/". $fuel . ".json";
        $jsonitem = $this->getContent($root);

        $longitud = floatval($longitud);
        $latitud = floatval($latitud);

        $result = [];
        $items = json_decode($jsonitem);
        foreach ($items as $item) {
            if ($this->isNear($latitud, $longitud, $item)) {
                $result[] = get_object_vars($item);
            }
        }

        return $result;
    }

    private function isNear($lat, $long, $item)
    {
        $radiusLat = 0.015;
        $radiusLong = 0.015;

        $latitude = floatval(str_replace(',', '.', $item->latitud));
        $longitude = floatval(str_replace(',', '.', $item->longitud));

        return ($latitude >= ($lat - $radiusLat)) && ($longitude >= ($long - $radiusLong)) &&
                ($latitude <= ($lat + $radiusLat)) && ($longitude <= ($long + $radiusLong));
    }
}
