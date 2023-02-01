<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Product\Exception;

use Exception;

class ProductNotFoundException extends Exception{
    protected $message = "no such product";
}
