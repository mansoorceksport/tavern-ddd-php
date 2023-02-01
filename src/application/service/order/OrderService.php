<?php
namespace Mansoor\TavernDddPhp\Application\Service\Order;

use Mansoor\TavernDddPhp\Domain\Aggregate\Customer;

use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerAddException;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Repository as CustomerRepository;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductNotFoundException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Repository as ProductRepository;

class OrderService{
    protected CustomerRepository $customerRepository;
    protected ProductRepository $productRepository;

    private function __construct(){}

    /**
     * @param []OrderConfiguration
     * @return OrderService
     */
    public static function NewOrder(...$orderConfiguration): OrderService
    {
        $os = new OrderService();
        foreach ($orderConfiguration as $oc) {
            $oc($os);
        }
        return $os;
    }

    /**
     * @throws CustomerAddException
     */
    public function setCustomer(Customer $customer): void{
        $this->customerRepository->add($customer);
    }

    /**
     * @throws ProductNotFoundException
     * @throws CustomerNotFoundException
     */
    public function CreateOrder(string $customerId, array $products): string{
        $total = 0.0;
        $customer = $this->customerRepository->getById($customerId);
        foreach($products as $product){
            $total += $product->getTotal();
        }

        return sprintf("customer with id: %s has ordered %d products with total %0.2f", $customer->getId(), count($products), $total);
    }
}
