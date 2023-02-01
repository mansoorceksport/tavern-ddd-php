<?php
namespace Mansoor\TavernDddPhp\Application\Service\Cart;

use Mansoor\TavernDddPhp\Domain\Aggregate\Product;
use Mansoor\TavernDddPhp\Domain\Repository\Cart\Repository as CartRepository;

class CartService{
    protected CartRepository $cartRepository;

    private function __construct(){}

    /**
     * @return CartService
     */
    public static function NewCart(...$cartConfiguration): CartService{
        $cartService = new CartService();
        foreach($cartConfiguration as $cc){
            $cc($cartService);
        }
        return $cartService;
    }

    /**
     * @param Product $product
     * @return void
     */
    public function addProduct(Product $product):void{
        $this->cartRepository->add($product);
    }

    /**
     * @return array
     */
    public function getProducts(): array{
        return $this->cartRepository->getAll();
    }
}

