<?php
namespace Mansoor\TavernDddPhp\Application\Service\Cart;

use Mansoor\TavernDddPhp\Domain\Aggregate\Product;

class CartService{
    private array $products = [];

    private function __construct(){}

    public static function NewCart(): CartService{
        $cartService = new CartService();
        $cartService->products = [];
        return $cartService;
    }

    public function addProduct(Product $product):void{
        $this->products[] = $product;
    }

    public function getProducts(): array{
        return $this->products;
    }
}

