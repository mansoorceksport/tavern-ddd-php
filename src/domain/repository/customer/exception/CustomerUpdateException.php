<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception;
class CustomerUpdateException extends \Exception{
    protected $message = "failed to update customer";
}
