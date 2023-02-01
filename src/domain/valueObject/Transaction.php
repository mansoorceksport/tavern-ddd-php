<?php
namespace Mansoor\TavernDddPhp\Domain\ValueObject;

use DateTime;

class Transaction{
    private float $amount;
    private string $from;
    private string $to;
    private DateTime $createdAt;
}
