<?php
namespace Mansoor\TavernDddPhp\Application\Service\Cart;

use Mansoor\TavernDddPhp\Domain\Aggregate\Product;

class CartService{
    /**
     * @var array
     */
    private array $products = [];

    private function __construct(){}

    /**
     * @return CartService
     */
    public static function NewCart(): CartService{
        $cartService = new CartService();
        $cartService->products = [];
        return $cartService;
    }

    /**
     * @param Product $product
     * @return void
     */
    public function addProduct(Product $product):void{
        $this->products[] = $product;
    }

    /**
     * @return array
     */
    public function getProducts(): array{
        return $this->products;
    }
}

