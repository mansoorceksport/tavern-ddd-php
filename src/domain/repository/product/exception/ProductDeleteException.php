<?php
namespace Mansoor\TavernDddPhp\domain\repository\product\exception;

class ProductDeleteException extends \Exception{
    protected $message = "failed to delete product";
}
