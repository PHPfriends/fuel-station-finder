<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Controller\UserController;
use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
//use Symfony\Component\BrowserKit\Request;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;


class UserControllerTest extends TestCase
{
    protected $doctrineRepository;

    public function setUp()
    {
        //$this->createRepositoryMock(UserRepository::class);
        //parent::setUp();
    }


    public function testCreateUserAction()
    {
        // Mock the request
        /*$requestMock = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();*/

        //$requestMock->request = $this->getMock(ParameterBag::class);


        /*$requestMock->request
            ->expects($this->atLeastOnce())
            ->method('all')
            ->will($this->returnValue(array(
                'name' => "petar",
            )));*/

        //$requestMock = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request");
        //create a request mock
       /* $requestMock = $this
            ->getMockBuilder(Request::class)
            ->getMock();*/
        //$requestMock->request = $this->getMock(ParameterBag::class);


        //set the return value
        /*$requestMock
            ->expects($this->atLeastOnce())
            ->method('getContent')
            ->will($this->returnValue(array(
                'name' => 'name',
            )));*/

       // $requestMock->attributes = $this->getAttributesMock();

        /*$testClass = new UserController();
        $result = $testClass->createUserAction($requestMock);*/
        //$this->assertEquals('r', $result);

        //var_dump($client->getResponse()->getStatusCode());
        //$this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    /**
     * Creates a simple Mock of the repository.
     *
     * @param $repositoryClass
     */
    protected function createRepositoryMock($repositoryClass)
    {
        $this->doctrineRepository = $this->getMockBuilder($repositoryClass)
            ->disableOriginalConstructor()
            ->getMock();
    }

}