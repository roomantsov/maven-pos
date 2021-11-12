<?php

namespace App\Service;

use App\DTO\ItemDTO;
use App\DTO\OrderRequestDTO;
use App\DTO\OrderRequestHeaderDTO;
use App\DTO\TotalDTO;
use App\Entity\OrderRequest;
use App\Entity\OrderRequestItem;
use Doctrine\ORM\EntityManagerInterface;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\SerializerInterface;

class DocumentBuilderService
{
    private $serializer;
    private $entityManager;
    private $orderRequestDTO;
    private $moneyService;

    public function prepareOrderRequestData($orderId)
    {
        $orderRequest = $this->entityManager->getRepository(OrderRequest::class)->find($orderId);

        if(is_null($orderRequest)){
            throw new NotFoundHttpException('Document with this ID can\'t be found.');
        }

        return $this->serializer->serialize($this->buildOrderRequestDTO($orderRequest), 'xml', [
            'xml_root_node_name' => 'cXML',
            'xml_encoding'       => 'UTF-8',
            'remove_empty_tags'  => true,
        ]);
    }

    public function buildOrderRequestDTO(OrderRequest $orderRequest)
    {
        return $this->orderRequestDTO
            ->setOrderRequestHeader($this->buildOrderRequestHeaderDTO($orderRequest))
            ->setItems($this->getItemDTOs($orderRequest))
            ;
    }

    public function buildOrderRequestHeaderDTO(OrderRequest $orderRequest)
    {
        $orderRequestHeaderDTO = new OrderRequestHeaderDTO();

        return $orderRequestHeaderDTO
            ->setId($orderRequest->getId())
            ->setCreatedAt($orderRequest->getCreatedAt())
            ->setTotalDTO($this->buildTotalDto($orderRequest))
            ->setBillingAddressEntity($orderRequest->getBillingAddress())
            ;
    }

    public function buildTotalDto(OrderRequest $orderRequest)
    {
        $total = $this->moneyService->countTotal($orderRequest);
        $moneyFormatter = new DecimalMoneyFormatter(new ISOCurrencies());

        $totalDTO = new TotalDTO();

        return $totalDTO
            ->setCurrency($total->getCurrency())
            ->setTotal($moneyFormatter->format($total))
            ;
    }

    public function getItemDTOs(OrderRequest $orderRequest){
        $orderItems = [];

        foreach($orderRequest->getOrderRequestItems() as $item){
            $orderItems[] = $this->buildItemDTO($item);
        }

        return $orderItems;
    }

    public function buildItemDTO(OrderRequestItem $orderRequestItem){
        $price = Money::USD($orderRequestItem->getPrice());
        $priceFormatted = (new DecimalMoneyFormatter(new ISOCurrencies()))->format($price);

        $itemDTO = new ItemDTO();

        return $itemDTO
            ->setId($orderRequestItem->getId())
            ->setName($orderRequestItem->getName())
            ->setQuantity($orderRequestItem->getQuantity())
            ->setPrice($priceFormatted)
            ->setCurrency($price->getCurrency())
            ;
    }

    public function __construct(
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer,
        OrderRequestDTO $orderRequestDTO,
        MoneyService $moneyService
    )
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
        $this->orderRequestDTO = $orderRequestDTO;
        $this->moneyService = $moneyService;
    }
}