<?php
namespace AppBundle\EventListener;

use Doctrine\Common\EventSubscriber;
// for Doctrine < 2.4: use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use AppBundle\Entity\User;

class UserSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            'postPersist',
            'postUpdate',
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function index(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        //dump($entity);die;

        // perhaps you only want to act on some "Product" entity
        if ($entity instanceof User) {
            $entityManager = $args->getEntityManager();
            // ... do something with the Product
            /*$user = new User();
            $user->setPassword("321");
            $user->setUsername("3211");
            $user->setEmail("32111");
            $entityManager->persist($user);
            $entityManager->flush();*/
        }
    }
}