<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Product\Memory;

use Mansoor\TavernDddPhp\Domain\Aggregate\Product;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductAddException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductDeleteException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductNotFoundException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductUpdateException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\repository;

class Memory implements repository {

    private array $products = [];

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->products;
    }

    /**
     * @inheritDoc
     */
    public function getById(string $id): Product
    {
        if(!array_key_exists($id, $this->products)) throw new ProductNotFoundException();

        return $this->products[$id];
    }

    /**
     * @inheritDoc
     */
    public function add(Product $p)
    {
        if(array_key_exists($p->getId(), $this->products)) throw new ProductAddException();
        $this->products[$p->getId()] = $p;
    }

    /**
     * @inheritDoc
     */
    public function update(Product $p)
    {
        if(!array_key_exists($p->getId(), $this->products)) throw new ProductUpdateException();
        $this->products[$p->getId()] = $p;
    }

    /**
     * @inheritDoc
     */
    public function delete(string $id)
    {
        if(!array_key_exists($id, $this->products)) throw new ProductDeleteException();
        unset($this->products[$id]);
    }
}
