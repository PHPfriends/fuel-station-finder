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

   public function updateUser(User $user, $andFlush = true){
       $this->entityManager->persist($user);
       if($andFlush){
           $this->entityManager->flush($user);
       }
   }
}