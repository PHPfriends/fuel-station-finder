<?php

namespace AppBundle\Controller;

use AppBundle\Managers\UserManager;
use PHPUnit\Runner\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    protected $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Rest\Post("user/create")
     */
    public function createUserAction(Request $request)
    {
        $user = $this->userManager->findUserBy(array('email' => $request->request->get('email')));

        if($user){
          throw new Exception("User already exists");
        }

        $user = $this->userManager->create($request);
        $this->userManager->save($user);

        return $user;
    }
}
