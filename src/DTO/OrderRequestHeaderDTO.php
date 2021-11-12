<?php

namespace App\DTO;

use App\Entity\BillingAddress;
use Symfony\Component\Serializer\Annotation\SerializedName;

class OrderRequestHeaderDTO
{

    /**
     * @SerializedName("@orderID")
     * @var integer
     */
    private $id;

    /**
     * @SerializedName("@orderDate")
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * @SerializedName("Total")
     * @var TotalDTO
     */
    private $totalDTO;

    /**
     * @SerializedName("BillTo")
     * @var BillingAddress
     */
    private $billingAddressEntity;

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeImmutable $createdAt
     * @return self
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return TotalDTO
     */
    public function getTotalDTO(): TotalDTO
    {
        return $this->totalDTO;
    }

    /**
     * @param TotalDTO $totalDTO
     */
    public function setTotalDTO(TotalDTO $totalDTO): self
    {
        $this->totalDTO = $totalDTO;

        return $this;
    }

    /**
     * @return BillingAddress
     */
    public function getBillingAddressEntity(): BillingAddress
    {
        return $this->billingAddressEntity;
    }

    /**
     * @param BillingAddress $billingAddressEntity
     */
    public function setBillingAddressEntity(BillingAddress $billingAddressEntity): self
    {
        $this->billingAddressEntity = $billingAddressEntity;

        return $this;
    }

}