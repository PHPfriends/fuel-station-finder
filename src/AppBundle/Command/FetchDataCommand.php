<?php
// src/AppBundle/Command/CreateUserCommand.php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Services\ExtractFuelPrice;

class FetchDataCommand extends ContainerAwareCommand
{
    private $fuelService;

    public function __construct(ExtractFuelPrice $fuelPrice){
        parent::__construct();
        $this->fuelService = $fuelPrice;
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:fetch-data')

            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new user.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a user...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->fuelService->getRowData();
        $this->fuelService->processData();
        $this->fuelService->save();
/*
        $rowData = file_get_contents('https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/');
        $fichero = 'gente.txt';
        $ficheroFuel = 'Fuel/G95.json';

        $g95 = 'Precio Gasoleo A';
        $address = 'Dirección';
        $latitud = 'Latitud';
        $longitud = 'Longitud (WGS84)';
        $localidad = 'Localidad';
        $provincia = "Provincia";

        $arrayByFuel95 = array();

        $rowDataTemp = json_decode($rowData);
        foreach($rowDataTemp as $key => $element){
            if($key == 'ListaEESSPrecio'){
                //Fuels stations level
                $i = 0;
                foreach($rowDataTemp->$key as $gasolinera) {
                    foreach($gasolinera as $property => $value){
                        //95
                        if($property == $g95)
                        {
                            $arrayByFuel95[$i]['adress'] = $gasolinera->$address;
                            $arrayByFuel95[$i]['city'] = $gasolinera->$localidad;
                            $arrayByFuel95[$i]['price'] = $gasolinera->$g95;
                            $arrayByFuel95[$i]['latitud'] = $gasolinera->$latitud;
                            $arrayByFuel95[$i]['longitud'] = $gasolinera->$longitud;
                            $arrayByFuel95[$i]['province'] = $gasolinera->$provincia;
                            $i++;
                        }
                    }

                }
            }
        }

        file_put_contents($ficheroFuel, json_encode($arrayByFuel95));*/


        $output->writeln('Exportados en la Carpeta Fuel!');
    }
}