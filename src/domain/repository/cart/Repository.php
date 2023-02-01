<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Cart;

use Mansoor\TavernDddPhp\Domain\Aggregate\Product;

interface Repository{
    public function getAll():array;
    public function add(Product $product): void;
    public function delete(Product $product): void;
}