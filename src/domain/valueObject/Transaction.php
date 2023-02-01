<?php
namespace Mansoor\TavernDddPhp\domain\valueObject;

use DateTime;

class Transaction{
    private float $amount;
    private string $from;
    private string $to;
    private DateTime $createdAt;
}
