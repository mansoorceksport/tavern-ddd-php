<?php
namespace Mansoor\TavernDddPhp\Application\Service\Order;

use Mansoor\TavernDddPhp\Application\Service\Cart\CartConfiguration;
use Mansoor\TavernDddPhp\Application\Service\Cart\CartService;
use Mansoor\TavernDddPhp\Domain\Aggregate\Customer;
use Mansoor\TavernDddPhp\Domain\Aggregate\Product;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerAddException;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductNotFoundException;
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
        $cart = CartService::NewCart(CartConfiguration::WithMemoryCartRepository());
        $item1 = clone $products[0];
        $item1->setQuantity(1);

        $item2 = clone $products[1];
        $item2->setQuantity(1);

        $cart->addProduct($item1);
        $cart->addProduct($item2);

        try {
            $result = $os->CreateOrder($customer->getId(), $cart->getProducts());
            $this->assertTrue($result != "", "create order fail");
            echo $result;
        } catch (ProductNotFoundException|CustomerNotFoundException $e) {
            $this->fail($e->getMessage());
        }
    }
}
