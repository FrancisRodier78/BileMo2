<?php

namespace App\Events;

use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ClientUserSubscriber implements EventSubscriberInterface{
    private $security;

    public function __construct(Security $security) {
        $this->security = $security;
    }
    
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setUserForClient', EventPriorities::PRE_VALIDATE]
        ];
    }

    public function setUserForClient(ViewEvent $event) {
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($user instanceof User && $method === "POST") {
            $client = $this->security->getUser();
            $user->setClient($client);
        }
    }
}