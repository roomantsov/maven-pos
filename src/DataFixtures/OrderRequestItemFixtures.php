<?php

namespace App\DataFixtures;

use App\Entity\OrderRequest;
use App\Entity\OrderRequestItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Money\Money;

class OrderRequestItemFixtures extends Fixture implements DependentFixtureInterface
{
    private $availableItems = [
        'Acer Swift 3',
        'Lenovo IdeaPad 1',
        'Lenovo Chromebook C330',
        'ASUS ProArt Studiobook One',
        'HP Chromebook 11-inch'
    ];

    public function load(ObjectManager $manager): void
    {
        $orderRequests = $manager->getRepository(OrderRequest::class)->findAll();

        foreach($orderRequests as $orderRequest){
            $itemsNb = rand(1, count($this->availableItems));

            for($i = 0; $i < $itemsNb; $i++){
                $price = Money::USD(rand(40000, 500000));
                $orderItem = (new OrderRequestItem())
                    ->setName($this->availableItems[$i])
                    ->setPrice($price->getAmount())
                    ->setQuantity(rand(1, 5))
                    ->setOrderRequest($orderRequest);

                $manager->persist($orderItem);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            OrderRequestFixtures::class
        ];
    }
}
