<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Product\Exception;

use Exception;

class ProductUpdateException extends Exception{
    protected $message = "failed to update product";
}
