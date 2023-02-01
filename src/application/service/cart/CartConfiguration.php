<?php
namespace Mansoor\TavernDddPhp\Application\Service\Cart;

use Closure;
use Mansoor\TavernDddPhp\Domain\Repository\Cart\Memory\Memory as CartMemoryRepository;

class CartConfiguration extends CartService{

    public static function WithMemoryCartRepository(): Closure{
        return function(CartService $cartService){
            $cartService->cartRepository = new CartMemoryRepository();
        };
    }
}
