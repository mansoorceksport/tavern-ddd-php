<?php
namespace Mansoor\TavernDddPhp\domain\repository\product\exception;

class ProductUpdateException extends \Exception{
    protected $message = "failed to update product";
}
