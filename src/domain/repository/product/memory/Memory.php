<?php
namespace Mansoor\TavernDddPhp\domain\repository\product\memory;

use Mansoor\TavernDddPhp\domain\aggregate\Product;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductAddException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductDeleteException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductNotFoundException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductUpdateException;
use Mansoor\TavernDddPhp\domain\repository\product\repository;

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
