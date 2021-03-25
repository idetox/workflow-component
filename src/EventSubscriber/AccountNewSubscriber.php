<?php

namespace App\EventSubscriber;

use App\Entity\Account;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\Event;
use Symfony\Component\Workflow\Event\GuardEvent;

class AccountNewSubscriber implements EventSubscriberInterface
{
    public function leaveNew(Event $event)
    {
        dump('leave new');
    }

    public function enterNew(Event $event)
    {
        dump('enter new');
    }

    public function enteredNew(Event $event)
    {
        dump('entered new');
    }

    public static function getSubscribedEvents()
    {
        return [
            'workflow.account_status.leave.NEW' => ['leaveNew'],
            'workflow.account_status.enter.NEW' => ['enterNew'],
            'workflow.account_status.entered.NEW' => ['enteredNew'],
        ];
    }
}