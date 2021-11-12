<?php

namespace App\Service;

use App\Entity\OrderRequest;
use Money\Money;

class MoneyService
{
    public function countTotal(OrderRequest $orderRequest): Money
    {
        $total = Money::USD(0);

        foreach($orderRequest->getOrderRequestItems() as $item){
            $positionTotal = Money::USD($item->getPrice())
                ->multiply($item->getQuantity());

            $total = $total->add($positionTotal);
        }

        return $total;
    }
}