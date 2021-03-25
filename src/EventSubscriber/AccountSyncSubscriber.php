<?php

namespace App\EventSubscriber;

use App\Entity\Account;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\Event;
use Symfony\Component\Workflow\Event\GuardEvent;

class AccountSyncSubscriber implements EventSubscriberInterface
{
    public function guardSync(GuardEvent $event)
    {
        dump('guard sync');
        /** @var Account $account */
        $account = $event->getSubject();
        $name = $account->getName();
        if ('blocked' === $name) {
            $event->setBlocked(true, 'This account cannot be synchronized.');
        }
    }

    public function leaveSync(Event $event)
    {
        dump('leave sync');
    }

    public function transitionSync(Event $event)
    {
        dump('transition sync');
    }

    public function enterSync(Event $event)
    {
        dump('enter sync');
    }

    public function enteredSync(Event $event)
    {
        dump('entered sync');
    }

    public function completedSync(Event $event)
    {
        dump('completed sync');
    }

    public function announceSync(Event $event)
    {
        dump('announce sync');
    }
    public function announceUnSync(Event $event)
    {
        dump('announce unsync');
    }

    public static function getSubscribedEvents()
    {
        return [
            'workflow.account_status.guard.to_sync' => ['guardSync'],
            'workflow.account_status.leave.SYNCHRONIZED' => ['leaveSync'],
            'workflow.account_status.transition.to_sync' => ['transitionSync'],
            'workflow.account_status.enter.SYNCHRONIZED' => ['enterSync'],
            'workflow.account_status.entered.SYNCHRONIZED' => ['enteredSync'],
            'workflow.account_status.completed.to_sync' => ['completedSync'],
            'workflow.account_status.announce.to_sync' => ['announceSync'],
            'workflow.account_status.announce.to_unsync' => ['announceUnSync'],
        ];
    }
}