<?php
namespace Mansoor\TavernDddPhp\Domain\Aggregate;

 use Mansoor\TavernDddPhp\Domain\Entity\Item;

 class Product extends Item{
     CONST PREFIX = "product_";
     private float $price = 0;
     private int $quantity = 0;
     private function __construct(){}

     /**
      * @param string $name
      * @param string $description
      * @param float $price
      * @return Product
      */
     public static function NewProduct(string $name, string $description, float $price): Product{
        $p = new Product();
        $p->id = uniqid(self::PREFIX);
        $p->name = $name;
        $p->description = $description;
        $p->price = $price;
        return $p;

    }

     /**
      * @return string
      */
     public function getId(): string{
         return $this->id;
    }

     /**
      * @return Item
      */
     public function getItem(): Item{
         $i = new Item();
         $i->id = $this->id;
         $i->name = $this->name;
         $i->description = $this->description;

         return $i;
    }

     /**
      * @return float
      */
     public function getPrice(): float{
         return $this->price;
    }

     /**
      * @param int $q
      * @return void
      */
     public function setQuantity(int $q): void{
         $this->quantity = $q;
    }

     /**
      * @return int
      */
     public function getQuantity(): int{
         return $this->quantity;
    }

    public function getTotal(): float{
         return $this->price*$this->quantity;
    }
}