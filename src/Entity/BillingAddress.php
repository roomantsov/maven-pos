<?php

namespace App\Entity;

use App\Repository\BillingAddressRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @ORM\Entity(repositoryClass=BillingAddressRepository::class)
 */
class BillingAddress
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @SerializedName("@addressID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @SerializedName("isoCountryCode")
     */
    private $isoCountryCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @SerializedName("Name")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @SerializedName("Street")
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=255)
     * @SerializedName("City")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @SerializedName("State")
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=10)
     * @SerializedName("@isoStateCode")
     */
    private $isoStateCode;

    /**
     * @ORM\Column(type="string", length=10)
     * @SerializedName("PostalCode")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @SerializedName("Country")
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsoCountryCode(): ?string
    {
        return $this->isoCountryCode;
    }

    public function setIsoCountryCode(string $isoCountryCode): self
    {
        $this->isoCountryCode = $isoCountryCode;

        return $this;
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

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getIsoStateCode(): ?string
    {
        return $this->isoStateCode;
    }

    public function setIsoStateCode(string $isoStateCode): self
    {
        $this->isoStateCode = $isoStateCode;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
