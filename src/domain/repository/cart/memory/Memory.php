<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Cart\Memory;

use Mansoor\TavernDddPhp\Domain\Aggregate\Product;
use Mansoor\TavernDddPhp\Domain\Repository\Cart\Exception\CartAddException;
use Mansoor\TavernDddPhp\Domain\Repository\Cart\Repository;

class Memory implements Repository {

    /**
     * @var array Product
     */
    private array $products = [];

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->products;
    }

    /**
     * @param Product $product
     * @throws CartAddException
     */
    public function add(Product $product): void
    {
        if(array_key_exists($product->getId(), $this->products)){
            throw new CartAddException();
        }
        $this->products[] = $product;
    }

    /**
     * @param Product $product
     * @throws CartAddException
     */
    public function delete(Product $product): void
    {
        if(!array_key_exists($product->getId(), $this->products)){
            throw new CartAddException();
        }
        unset($this->products[$product->getId()]);
    }
}