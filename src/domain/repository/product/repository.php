<?php
namespace Mansoor\TavernDddPhp\Domain\Repository\Product;

use Mansoor\TavernDddPhp\Domain\Aggregate\Product;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductAddException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductDeleteException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductNotFoundException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductUpdateException;


interface repository{
     /**
      * @return array []Product
      */
     public function getAll(): array;

     /**
      * @param string $id
      * @throws ProductNotFoundException
      * @return Product
      */
     public function getById(string $id): Product;

     /**
      * @param Product $p
      * @throws ProductAddException
      */
     public function add(Product $p);

     /**
      * @param Product $p
      * @throws ProductUpdateException
      */
     public function update(Product $p);

    /**
     * @param string $id
     * @throws ProductDeleteException
     */
    public function delete(string $id);

 }
