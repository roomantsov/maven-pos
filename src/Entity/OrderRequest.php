<?php

namespace App\Entity;

use App\Repository\OrderRequestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass=OrderRequestRepository::class)
 */
class OrderRequest
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
    private $payloadId;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=OrderRequestItem::class, mappedBy="orderRequest", orphanRemoval=true)
     */
    private $orderRequestItems;

    /**
     * @ORM\ManyToOne(targetEntity=BillingAddress::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $billingAddress;

    public function __construct()
    {
        $this->orderRequestItems = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPayloadId(): ?string
    {
        return $this->payloadId;
    }

    public function setPayloadId(string $payloadId): self
    {
        $this->payloadId = $payloadId;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|OrderRequestItem[]
     */
    public function getOrderRequestItems(): Collection
    {
        return $this->orderRequestItems;
    }

    public function addOrderRequestItem(OrderRequestItem $orderRequestItem): self
    {
        if (!$this->orderRequestItems->contains($orderRequestItem)) {
            $this->orderRequestItems[] = $orderRequestItem;
            $orderRequestItem->setOrderRequest($this);
        }

        return $this;
    }

    public function removeOrderRequestItem(OrderRequestItem $orderRequestItem): self
    {
        if ($this->orderRequestItems->removeElement($orderRequestItem)) {
            // set the owning side to null (unless already changed)
            if ($orderRequestItem->getOrderRequest() === $this) {
                $orderRequestItem->setOrderRequest(null);
            }
        }

        return $this;
    }

    public function getBillingAddress(): ?BillingAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?BillingAddress $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }
}
