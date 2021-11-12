<?php

namespace App\DataFixtures;

use App\Entity\BillingAddress;
use App\Entity\OrderRequest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrderRequestFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $billingAddresses = $manager->getRepository(BillingAddress::class)->findAll();

        $order1 = (new OrderRequest())
            ->setPayloadId(time() . '@216.14.181.110')
            ->setBillingAddress($billingAddresses[array_rand($billingAddresses)]);
        $manager->persist($order1);

        $order2 = (new OrderRequest())
            ->setPayloadId(time() . '@103.163.132.154')
            ->setBillingAddress($billingAddresses[array_rand($billingAddresses)]);
        $manager->persist($order2);

        $order3 = (new OrderRequest())
            ->setPayloadId(time() . '@172.101.126.39')
            ->setBillingAddress($billingAddresses[array_rand($billingAddresses)]);
        $manager->persist($order3);

        $order4 = (new OrderRequest())
            ->setPayloadId(time() . '@75.139.31.0')
            ->setBillingAddress($billingAddresses[array_rand($billingAddresses)]);
        $manager->persist($order4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BillingAddressFixtures::class
        ];
    }
}
