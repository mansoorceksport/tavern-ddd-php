<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception;


use Exception;

class CustomerAddException extends Exception
{
    protected $message = "failed to add customer";
}
