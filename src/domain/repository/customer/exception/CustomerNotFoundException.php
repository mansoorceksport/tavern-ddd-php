<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception;
class CustomerNotFoundException extends \Exception{
    protected $message = "the customer was not found in the repository";
}
