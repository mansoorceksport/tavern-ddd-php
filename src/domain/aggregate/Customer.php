<?php

namespace Mansoor\TavernDddPhp\Domain\Aggregate;

use Mansoor\TavernDddPhp\Domain\Entity\Item;
use Mansoor\TavernDddPhp\Domain\Entity\Person;
use Mansoor\TavernDddPhp\Domain\ValueObject\Transaction;

final class Customer extends Person{
    CONST PREFIX = "customer_";

    // array of products
    private array $products = [];

    //array of transactions
    private array $transactions = [];

    private function __construct(){}

    public static function NewCustomer(string $name): Customer
    {
        $c = new Customer();
        $c->setName($name);
        $c->setId(uniqid(self::PREFIX));
        return $c;
    }


    /**
     * @return Item[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }


    /**
     * @return Transaction[]
     */
    public function getTransactions(): array{
        return $this->transactions;
    }

    private function setId(string $id){
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getId(): string{
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name){
        $this->name = strtolower($name);
    }
}