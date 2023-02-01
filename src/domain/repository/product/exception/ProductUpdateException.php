<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Product\Exception;

class ProductUpdateException extends \Exception{
    protected $message = "failed to update product";
}
