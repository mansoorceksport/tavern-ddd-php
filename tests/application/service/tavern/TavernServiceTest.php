<?php
namespace Mansoor\TavernDddPhp\Application\Service\Tavern;

use Mansoor\TavernDddPhp\Application\Service\Order\OrderConfiguration;
use Mansoor\TavernDddPhp\Application\Service\Order\OrderService;
use Mansoor\TavernDddPhp\domain\aggregate\Customer;
use Mansoor\TavernDddPhp\domain\aggregate\Product;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductAddException;
use PHPUnit\Framework\TestCase;
use Mansoor\TavernDddPhp\Application\Service\Tavern;

class TavernServiceTest extends TestCase{

    public function testOrder(){
        try {
            $c = Customer::NewCustomer("Mansoor");
            $p = Product::NewProduct("apple", "good for teath", 0.99);
            $orderService = OrderService::NewOrder(
                OrderConfiguration::WithCustomerMemoryRepository(),
                OrderConfiguration::WithProductMemoryRepository()
            );
//            $orderService->customerRepository->add($c);
//            $orderService->productRepository->add($p);

            $tavern = TavernService::NewTavern(
                TavernConfiguration::WithOrderService($orderService)
            );
            $tavern->order();
        } catch (ProductAddException $e) {
        }

    }
}
