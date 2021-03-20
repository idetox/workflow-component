<?php

namespace App\Controller\Account;

use App\Entity\Account;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class Create
{
    /**
     * @Route("/accounts", name="create_account", methods={"POST"})
     */
    public function __invoke(Request $request, SerializerInterface $serializer)
    {
        $account = $serializer->deserialize($request->getContent(), Account::class, 'json');
    }
}