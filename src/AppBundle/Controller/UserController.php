<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Controller\BaseController;

class UserController extends BaseController
{
    protected $em;
    protected $repository;

    public function __construct()
    {

    }

    /**
     * @Rest\Post("user/create")
     */
    public function createUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->repository = $this->getDoctrine()->getRepository(User::class);

        $user = $this->repository->findOneBy(
            array('email' => $request->request->get('email'))
        );

        if(!$user){
            $user = new User();
        }

        $user->setEmail($request->request->get('email'));
        $user->setLastLogin(new \DateTime());
        $user->setUsername($request->request->get('username'));
        $user->setPassword($request->request->get('password'));

        $em->persist($user);
        $em->flush();

        return $user;
        //return 'r';
    }
}
