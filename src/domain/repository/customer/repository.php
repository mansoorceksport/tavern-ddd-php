<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Customer;

use Mansoor\TavernDddPhp\domain\aggregate\Customer;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerAddException;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerUpdateException;

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
