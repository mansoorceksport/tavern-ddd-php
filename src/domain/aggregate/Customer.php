<?php

namespace Mansoor\TavernDddPhp\domain\aggregate;

use Mansoor\TavernDddPhp\domain\entity\Item;
use Mansoor\TavernDddPhp\domain\entity\Person;
use Mansoor\TavernDddPhp\domain\valueObject\Transaction;

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
        $this->name = $name;
    }
}