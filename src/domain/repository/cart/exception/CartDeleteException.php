<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Cart\Exception;

use Exception;

class CartDeleteException extends Exception{
    /**
     * @var string
     */
    protected $message = "failed to delete product";
}
