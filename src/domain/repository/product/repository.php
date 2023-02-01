<?php
namespace Mansoor\TavernDddPhp\domain\repository\product;

use Mansoor\TavernDddPhp\domain\aggregate\Product;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductAddException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductDeleteException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductNotFoundException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductUpdateException;

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
