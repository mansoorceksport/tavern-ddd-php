<?php
namespace Mansoor\TavernDddPhp\domain\repository\customer\exception;
class CustomerNotFoundException extends \Exception{
    protected $message = "the customer was not found in the repository";
}
