<?php

namespace App\Controller;

use App\Entity\Account;
use App\Repository\AccountRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Workflow\WorkflowInterface;

class DefaultController
{
    /**
     * @Route("/default", name="test_accounts_workflow", methods={"GET"})
     */
    public function __invoke(WorkflowInterface $accountStatusStateMachine)
    {
        $account = new Account();
        $account->setName('name');

        dump('workflow can');
        if($accountStatusStateMachine->can($account, 'to_sync')){
            dump('workflow apply');
            $accountStatusStateMachine->apply($account, 'to_sync');
        }
        dd($account);
    }
}