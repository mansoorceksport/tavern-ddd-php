<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception;

class CustomerAddException extends \Exception{
    protected $message = "failed to add customer";
}
