<?php

namespace AppBundle\Managers;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

class UserManager
{
   protected $entityManager;
   protected $repository;


   public function __construct(
       EntityManager $em
   )
   {
       $this->entityManager = $em;
       $this->repository = $this->entityManager->getRepository('AppBundle:User');
   }

   public function findUserBy(array $criteria){
       return $this->repository->findOneBy($criteria);
   }

   public function save(User $user, $andFlush = true){
       $this->entityManager->persist($user);
       if($andFlush){
           $this->entityManager->flush($user);
       }
   }

   public function create($request){
       $user = new User();
       $user->setEmail($request->request->get('email'));
       $user->setLastLogin(new \DateTime());
       $user->setUsername($request->request->get('username'));
       $user->setPassword($request->request->get('password'));

       return $user;
   }

}