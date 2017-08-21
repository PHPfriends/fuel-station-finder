<?php
namespace AppBundle\Services;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ExtractFuelPrice
{
    private $url = 'https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/';
    private $rowData;
    private $arrayByFuel = array();

    public function getRowData()
    {
        $this->rowData = file_get_contents($this->url);
        $this->rowData = json_decode($this->rowData);
    }

    public function processData()
    {
        $gA = 'Precio Gasoleo A';
        $g95 = 'Precio Gasolina 95 Protección';

        foreach($this->rowData as $key => $element){
            if($key == 'ListaEESSPrecio'){
                //Fuels stations level
                $i = 0;
                foreach($this->rowData->$key as $gasolinera) {
                    foreach($gasolinera as $property => $value){
                        /*switch ($property) {
                            case $gA:
                                $fuel = 'GA';
                                break;
                            case $g95:
                                $fuel = 'G95';
                                break;
                        }*/

                        if($property == $gA)
                        {
                            $fuel = 'GA';
                            $this->buildArray($fuel, $i, $gasolinera, $gA);
                            $i++;
                        }elseif($property == $g95){
                            $fuel = 'G95';
                            $this->buildArray($fuel, $i, $gasolinera, $g95);
                            $i++;
                        }
                    }
                }
            }
        }
    }

    public function buildArray($fuel, $i, $gasolinera, $FuelType)
    {
        $address = 'Dirección';
        $name = 'Rótulo';
        $latitud = 'Latitud';
        $longitud = 'Longitud (WGS84)';
        $localidad = 'Localidad';
        $provincia = "Provincia";

        $this->arrayByFuel[$fuel][$i]['address'] = $gasolinera->$address;
        $this->arrayByFuel[$fuel][$i]['name'] = $gasolinera->$name;
        $this->arrayByFuel[$fuel][$i]['city'] = $gasolinera->$localidad;

        $this->arrayByFuel[$fuel][$i]['price'] = $gasolinera->$FuelType;

        $this->arrayByFuel[$fuel][$i]['latitud'] = $gasolinera->$latitud;
        $this->arrayByFuel[$fuel][$i]['longitud'] = $gasolinera->$longitud;
        $this->arrayByFuel[$fuel][$i]['province'] = $gasolinera->$provincia;
    }



    public function save(){

        foreach($this->arrayByFuel as $key => $data){
            $ficheroFuel = "Fuel/$key.json";
            file_put_contents($ficheroFuel, json_encode($this->arrayByFuel[$key]));
        }

    }

}

