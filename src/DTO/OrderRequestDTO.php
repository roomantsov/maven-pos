<?php

namespace App\DTO;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Serializer\Annotation\SerializedName;

class OrderRequestDTO
{
    /**
     * @SerializedName("@payloadID")
     * @var string
     */
    private $payloadId;

    /**
     * @SerializedName("@timestamp")
     * @var \DateTimeImmutable
     */
    private $timestamp;

    /**
     * @SerializedName("OrderRequestHeader")
     * @var OrderRequestHeaderDTO
     */
    private $orderRequestHeader;

    /**
     * @SerializedName("ItemOut")
     * @var array
     */
    private $items;

    public function __construct(RequestStack $requestStack)
    {
        $this->timestamp = new \DateTimeImmutable();
        $this->payloadId = time() . '@' . $requestStack->getCurrentRequest()->getHost();
    }

    /**
     * @return string
     */
    public function getPayloadId(): string
    {
        return $this->payloadId;
    }

    /**
     * @param string $payloadId
     * @return self
     */
    public function setPayloadId(string $payloadId): self
    {
        $this->payloadId = $payloadId;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getTimestamp(): \DateTimeImmutable
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTimeImmutable $timestamp
     * @return  self
     */
    public function setTimestamp(\DateTimeImmutable $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return ?OrderRequestHeaderDTO
     */
    public function getOrderRequestHeader(): ?OrderRequestHeaderDTO
    {
        return $this->orderRequestHeader;
    }

    /**
     * @param OrderRequestHeaderDTO $orderRequestHeader
     * @return self
     */
    public function setOrderRequestHeader(OrderRequestHeaderDTO $orderRequestHeader): self
    {
        $this->orderRequestHeader = $orderRequestHeader;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
    }
}