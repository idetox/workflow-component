<?php

namespace App\DataFixtures;

use App\Entity\Account;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $randStatus = [
            Account::STATUS_NEW,
            Account::STATUS_SYNCHRONIZED,
            Account::STATUS_UNSYNCHRONIZED
        ];

        for ($i = 0; $i < 20; $i++) {
            $account = new Account();
            $account->setName('name'.$i);
            $account->setStatus($randStatus[$i%3]);
            $manager->persist($account);
        }

        $manager->flush();
    }
}
