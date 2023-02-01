<?php

namespace Mansoor\TavernDddPhp\Application\Service\Order;

use Closure;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Memory\Memory as CustomerMemoryRepository;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Memory\Memory as ProductMemoryRepository;

final class OrderConfiguration extends OrderService
{
    public static function WithCustomerMemoryRepository(): Closure{
        return function(OrderService $orderService){
            $orderService->customerRepository = new CustomerMemoryRepository();
        };
    }

    public static function WithProductMemoryRepository(array $products): Closure{
        return function (OrderService $orderService) use ($products){
            $productMemoryRepository = new ProductMemoryRepository();
            foreach ($products as $product){
                $productMemoryRepository->add($product);
            }
            $orderService->productRepository = $productMemoryRepository;
        };
    }
}