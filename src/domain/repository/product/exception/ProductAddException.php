<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Product\Exception;

use Exception;

class ProductAddException extends Exception{
    protected $message = "failed to add product";
}
