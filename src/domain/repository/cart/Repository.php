<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Cart;

use Mansoor\TavernDddPhp\Domain\Aggregate\Product;

interface Repository{
    /**
     * @return array
     */
    public function getAll():array;

    /**
     * @param Product $product
     * @return void
     */
    public function add(Product $product): void;

    /**
     * @param Product $product
     * @return void
     */
    public function delete(Product $product): void;
}