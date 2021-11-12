<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;

class TotalDTO
{
    /**
     * @SerializedName("@currency")
     * @var string
     */
    private $currency;

    /**
     * @SerializedName("Money")
     * @var float
     */
    private $total;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }


}