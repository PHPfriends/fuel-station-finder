<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Managers\UserManager;
use PHPUnit\Runner\Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Controller\BaseController;

class UserController extends Controller
{
    protected $em;
    protected $repository;
    protected $container;
    protected $managerRegistry;
    protected $doctrineRepository;
    protected $userManager;

    public function __construct(
        //ContainerInterface $container
        UserManager $userManager
    )
    {
        $this->userManager = $userManager;
        /*$this->container = $container;
        $this->managerRegistry = $container->get('doctrine');
        $this->em = $this->managerRegistry->getManagerForClass(User::class);
        $this->doctrineRepository = $this->em->getRepository(User::class);
    */}

    /**
     * @Rest\Post("user/create")
     */
    public function createUserAction(Request $request)
    {
        //$em = $this->getDoctrine()->getManager();
        //$this->repository = $this->getDoctrine()->getRepository(User::class);

        /*$user = $this->doctrineRepository->findOneBy(
            array('email' => $request->request->get('email'))
        );*/

        $user = $this->userManager->findUserBy(array('email' => $request->request->get('email')));

        if($user){
          throw new Exception("User already exists");
        }

        $user = new User();
        $user->setEmail($request->request->get('email'));
        $user->setLastLogin(new \DateTime());
        $user->setUsername($request->request->get('username'));
        $user->setPassword($request->request->get('password'));

        /*$this->em->persist($user);
        $this->em->flush();*/
        $this->userManager->updateUser($user);

        return $user;
    }
}
