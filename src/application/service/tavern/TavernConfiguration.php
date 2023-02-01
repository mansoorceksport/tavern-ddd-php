<?php
namespace Mansoor\TavernDddPhp\Application\Service\Tavern;

use Mansoor\TavernDddPhp\Application\Service\Order\OrderService;
use Closure;

final class TavernConfiguration{

    public static function WithOrderService(OrderService $orderService): Closure{
        return function(TavernService $ts) use ($orderService) {
            $ts->orderService = $orderService;
        };
    }
}
