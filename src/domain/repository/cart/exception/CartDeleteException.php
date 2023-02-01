<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Cart\Exception;

use Exception;

class CartDeleteException extends Exception{
    protected $message = "failed to delete product";
}
