<?php
namespace Mansoor\TavernDddPhp\Domain\Aggregate;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase{
    public function testNewCustomer()
    {
        $testCases = [
            [
                "name" => "mansoor",
                "expected" => "mansoor",
            ],
            [
                "name" => "Mansoor",
                "expected" => "mansoor",
            ]
        ];

        foreach ($testCases as $tc){
            $customer = Customer::NewCustomer($tc['name']);
            $this->assertSame($tc['expected'], $customer->getName(), "new customer failed");
        }
    }
}