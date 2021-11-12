<?php

namespace App\Serializer;

use App\DTO\OrderRequestDTO;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class OrderRequestNormalizer implements ContextAwareNormalizerInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = $this->normalizer->normalize($object, $format, $context);

        $data['Request'] = [
            'OrderRequest' => [
                'OrderRequestHeader' => $data['OrderRequestHeader'],
                'ItemOut'            => $data['ItemOut']
            ]
        ];

        unset($data['OrderRequestHeader'], $data['ItemOut']);

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof OrderRequestDTO;
    }
}