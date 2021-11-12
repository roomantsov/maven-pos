<?php

namespace App\DataFixtures;

use App\Entity\BillingAddress;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BillingAddressFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $billingAddress1 = (new BillingAddress())
            ->setStreet('2999 Stroop Hill Road')
            ->setState('GA')
            ->setIsoStateCode('US-GA')
            ->setCountry('United States')
            ->setIsoCountryCode('US')
            ->setName('Joe B Allen')
            ->setCity('Atlanta')
            ->setPostalCode('30303');
        $manager->persist($billingAddress1);

        $billingAddress2 = (new BillingAddress())
            ->setStreet('4284 Emily Renzelli Boulevard')
            ->setState('CA')
            ->setIsoStateCode('US-CA')
            ->setCountry('United States')
            ->setIsoCountryCode('US')
            ->setName('Gail W Thompson')
            ->setCity('Salinas')
            ->setPostalCode('93901');
        $manager->persist($billingAddress2);

        $billingAddress3 = (new BillingAddress())
            ->setStreet('3087 Coolidge Street')
            ->setState('MT')
            ->setIsoStateCode('US-MT')
            ->setCountry('United States')
            ->setIsoCountryCode('US')
            ->setName('Monika T Harrell')
            ->setCity('Montana')
            ->setPostalCode('59301');
        $manager->persist($billingAddress3);

        $manager->flush();
    }
}
