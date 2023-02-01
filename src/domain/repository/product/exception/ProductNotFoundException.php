<?php
namespace Mansoor\TavernDddPhp\domain\repository\product\exception;

class ProductNotFoundException extends \Exception{
    protected $message = "no such product";
}
