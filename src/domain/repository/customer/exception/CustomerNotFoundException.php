<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception;

use Exception;

class CustomerNotFoundException extends Exception{
    protected $message = "the customer was not found in the repository";
}
