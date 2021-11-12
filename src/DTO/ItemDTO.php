<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ItemDTO
{
    /**
     * @SerializedName("ItemID")
     * @var integer
     */
    private $id;

    /**
     * @SerializedName("Description")
     * @var string
     */
    private $name;

    /**
     * @SerializedName("UnitPrice")
     * @var float
     */
    private $price;

    /**
     * @SerializedName("@currency")
     * @var string
     */
    private $currency;

    /**
     * @SerializedName("@quantity")
     * @var integer
     */
    private $quantity;

    /**
     * @SerializedName("UnitOfMeasure")
     * @var string
     */
    private $unitOfMeasure = "EA";

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return self
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnitOfMeasure(): string
    {
        return $this->unitOfMeasure;
    }

}