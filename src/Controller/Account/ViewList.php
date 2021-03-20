<?php

namespace App\Controller\Account;

use App\Repository\AccountRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ViewList
{
    /**
     * @Route("/accounts", name="list_account", methods={"GET"})
     */
    public function __invoke(Request $request, AccountRepository $accountRepository, SerializerInterface $serializer)
    {
        return new JsonResponse($serializer->normalize($accountRepository->findAll()));
    }
}