<?php

namespace App\Entity;

use App\Repository\OrderRequestItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRequestItemRepository::class)
 * @ORM\Table(name="order_request_item",uniqueConstraints={@ORM\UniqueConstraint(name="order_items_idx", columns={"order_request_id", "name"})})
 */
class OrderRequestItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    private $price;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=OrderRequest::class, inversedBy="orderRequestItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orderRequest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrderRequest(): ?OrderRequest
    {
        return $this->orderRequest;
    }

    public function setOrderRequest(?OrderRequest $orderRequest): self
    {
        $this->orderRequest = $orderRequest;

        return $this;
    }

}
