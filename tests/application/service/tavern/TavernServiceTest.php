<?php
namespace Mansoor\TavernDddPhp\Application\Service\Tavern;

use Mansoor\TavernDddPhp\Application\Service\Order\OrderConfiguration;
use Mansoor\TavernDddPhp\Application\Service\Order\OrderService;
use Mansoor\TavernDddPhp\domain\aggregate\Customer;
use Mansoor\TavernDddPhp\domain\aggregate\Product;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerAddException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductAddException;
use PHPUnit\Framework\TestCase;
use Mansoor\TavernDddPhp\Application\Service\Tavern;

class TavernServiceTest extends TestCase{

    private function init(): array{
        $products = [];
        $apple = Product::NewProduct("apple", "good for teeth", 0.99);
        $orange = Product::NewProduct("orange", "lots of vitamin c", 0.50);
        $dragonFruit = Product::NewProduct("dragon fruit", "tackle diabetes", 1.50);

        array_push($products, $apple, $orange, $dragonFruit);
        return $products;
    }
    public function testOrder(){
        try {
            $products = $this->init();
            $c = Customer::NewCustomer("Mansoor");
            $orderService = OrderService::NewOrder(
                OrderConfiguration::WithCustomerMemoryRepository(),
                OrderConfiguration::WithProductMemoryRepository($products)
            );
            $orderService->setCustomer($c);

            $tavern = TavernService::NewTavern(
                TavernConfiguration::WithOrderService($orderService)
            );

            // make order
            $orders = [
                $products[0]->getId(),
                $products[1]->getId()
            ];

            $result = $tavern->order($c->getId(),$orders);
            $this->assertTrue($result != "", "create order fail");
        } catch (ProductAddException|CustomerAddException $e) {
            $this->fail($e->getMessage());
        }

    }
}