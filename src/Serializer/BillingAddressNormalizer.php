<?php

namespace App\Serializer;

use App\Entity\BillingAddress;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class BillingAddressNormalizer implements ContextAwareNormalizerInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = $this->normalizer->normalize($object, $format, $context);
        $data = [
            'Address' => [
                '@addressID'     => $data['@addressID'],
                'Name'           => $data['Name'],
                'PostalAddress'  => [
                    'Street' => $data['Street'],
                    'City'   => $data['City'],
                    'State'  => [
                        '@isoStateCode' => $data['@isoStateCode'],
                        '#'             => $data['State']
                    ],
                    'PostalCode' => $data['PostalCode'],
                    'Country'    => [
                        '@isoCountryCode' => $data['@isoStateCode'],
                        '#'               => $data['Country']
                    ]
                ]
            ]
        ];

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof BillingAddress;
    }
}