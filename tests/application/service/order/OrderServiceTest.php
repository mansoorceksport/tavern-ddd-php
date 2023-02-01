<?php
namespace Mansoor\TavernDddPhp\Application\Service\Order;

use Mansoor\TavernDddPhp\domain\aggregate\Customer;
use Mansoor\TavernDddPhp\domain\aggregate\Product;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerAddException;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductNotFoundException;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{

    private function init(): array{
        $products = [];
        $apple = Product::NewProduct("apple", "good for teeth", 0.99);
        $orange = Product::NewProduct("orange", "lots of vitamin c", 0.50);
        $dragonFruit = Product::NewProduct("dragon fruit", "tackle diabetes", 1.50);

        array_push($products, $apple, $orange, $dragonFruit);
        return $products;
    }

    public function testCreateOrder()
    {
        $products = $this->init();
        $os = OrderService::NewOrder(
            OrderConfiguration::WithCustomerMemoryRepository(),
            OrderConfiguration::WithProductMemoryRepository($products)
        );
        $customer = Customer::NewCustomer("Mansoor");
        try {
            $os->setCustomer($customer);
        } catch (CustomerAddException $e) {
            $this->fail($e->getMessage());
        }

        // make order
        $orders = [
            $products[0]->getId(),
            $products[1]->getId()
        ];

        try {
            $result = $os->CreateOrder($customer->getId(), $orders);
            $this->assertTrue($result != "", "create order fail");
            echo $result;
        } catch (ProductNotFoundException|CustomerNotFoundException $e) {
            $this->fail($e->getMessage());
        }
    }
}
