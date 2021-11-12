<?php

namespace App\Serializer;

use App\DTO\ItemDTO;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ItemNormalizer implements ContextAwareNormalizerInterface
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
            '@quantity'  => $data['@quantity'],
            'ItemID'     => [
                'SupplierPartID' => $data['ItemID']
            ],
            'ItemDetail' => [
                'UnitPrice'     => [
                    'Money'     => [
                        '@currency' => $data['@currency'],
                        '#'         => $data['UnitPrice']
                    ]
                ],
                'Description'   => $data['Description'],
                'UnitOfMeasure' => $data['UnitOfMeasure']
            ]
        ];

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof ItemDTO;
    }
}