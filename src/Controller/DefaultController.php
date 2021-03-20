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

class DefaultController
{
    /**
     * @Route("/default", name="default")
     */
    public function __invoke(Request $request, AccountRepository $accountRepository, NormalizerInterface $normalizer, ObjectManager $manager)
    {
        /** @var Account $account */
        $account = $accountRepository->find(1);
        $account->setStatus(Account::STATUS_NEW);
        $manager->persist($account);
        $manager->flush();
        return new JsonResponse($normalizer->normalize($account));
    }
}