<?php

namespace App\Serializer;

use App\DTO\TotalDTO;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class TotalCurrencyNormalizer implements ContextAwareNormalizerInterface
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
            'Money' => [
                '@currency' => $data['@currency'],
                '#' => $data['Money']
            ]
        ];

//        $data['Money']['@currency'] = $data['@currency'];

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof TotalDTO;
    }
}