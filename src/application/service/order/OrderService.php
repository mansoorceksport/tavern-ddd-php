<?php
namespace Mansoor\TavernDddPhp\Application\Service\Order;

use Mansoor\TavernDddPhp\domain\aggregate\Customer;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerAddException;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\domain\repository\customer\Repository as CustomerRepository;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductNotFoundException;
use Mansoor\TavernDddPhp\domain\repository\product\Repository as ProductRepository;

class OrderService{
    //TODO how to hide the customer repository with private and still use the orderconfigurator pattern
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
    public function setCustomer(Customer $customer){
        $this->customerRepository->add($customer);
    }

    /**
     * @throws ProductNotFoundException
     * @throws CustomerNotFoundException
     */
    public function CreateOrder(string $customerId, array $productIds): string{
        $products = [];
        $total = 0.0;
        $customer = $this->customerRepository->getById($customerId);
        foreach($productIds as $id){
            $p = $this->productRepository->getById($id);
            $products[] = $p;
            $total += $p->getPrice();
        }

        return sprintf("customer with id: %s has ordered %d products with total %0.2f", $customer->getId(), count($products), $total);
    }
}
