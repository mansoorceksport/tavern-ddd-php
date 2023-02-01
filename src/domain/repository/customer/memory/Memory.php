<?php

namespace Mansoor\TavernDddPhp\Domain\Repository\Customer\Memory;

use Mansoor\TavernDddPhp\Domain\Aggregate\Customer;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerAddException;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerUpdateException;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Repository;

class Memory implements Repository {

    private array $customer = [];


    /**
     * @param string $id
     * @return Customer
     * @throws CustomerNotFoundException
     */
    public function getById(string $id): Customer
    {
        // check if the customer exists
        if(!$this->checkCustomer($id)){
            throw new CustomerNotFoundException();
        }

        return $this->customer[$id];
    }

    /**
     * @inheritDoc
     * @throws CustomerAddException
     */
    public function add(Customer $c)
    {
        // check if the customer exists
        if($this->checkCustomer($c->getId())){
            throw new CustomerAddException();
        }

        // add the customer to memory
        $this->customer[$c->getId()] = $c;
    }

    /**
     * @inheritDoc
     * @throws CustomerUpdateException
     */
    public function update(Customer $c)
    {
        // check if the customer exists
        if($this->checkCustomer($c->getId())) throw new CustomerUpdateException();

        // update the customer to memory
        $this->customer[$c->getId()] = $c;
    }

    /**
     * @param $id
     * @return bool
     */
    private function checkCustomer($id): bool{
        return array_key_exists($id, $this->customer);
    }
}
