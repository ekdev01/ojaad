<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/10/17
 * Time: 14:15
 */

namespace EK\OjaadBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RegistrationListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
          FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess'
        ];
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $roles = [
            'ROLE_USER'
        ];

        $user = $event->getForm()->getData();
        $user->setRoles($roles);
    }

}