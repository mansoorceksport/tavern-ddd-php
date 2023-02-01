<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Cart\Exception;

use Exception;

class CartAddException extends Exception{
    protected $message = "failed to add product";
}
