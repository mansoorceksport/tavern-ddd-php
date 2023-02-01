<?php
namespace Mansoor\TavernDddPhp\domain\repository\customer;



use Mansoor\TavernDddPhp\domain\aggregate\Customer;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerAddException;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerUpdateException;

interface Repository{
    /**
     * @param string $id
     * @throws CustomerNotFoundException
     * @return Customer
     */
    public function getById(string $id): Customer;


    /**
     * @param Customer $c
     * @throws CustomerAddException
     */
    public function add(Customer $c);

    /**
     * @param Customer $c
     * @throws CustomerUpdateException
     */
    public function update(Customer $c);
}
