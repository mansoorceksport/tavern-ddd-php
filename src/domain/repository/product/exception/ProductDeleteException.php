<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Product\Exception;

use Exception;

class ProductDeleteException extends Exception{
    protected $message = "failed to delete product";
}
