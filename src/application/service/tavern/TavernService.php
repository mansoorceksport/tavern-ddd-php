<?php
namespace Mansoor\TavernDddPhp\Application\Service\Tavern;

use Mansoor\TavernDddPhp\Application\Service\Order\OrderService;
use Mansoor\TavernDddPhp\domain\repository\customer\exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\domain\repository\product\exception\ProductNotFoundException;

class TavernService{

    public OrderService $orderService;

    private function __construct(){}

    public static function NewTavern(...$tavernConfiguration): TavernService{
        $ts = new TavernService();
        foreach ($tavernConfiguration as $tc){
            $tc($ts);
        }
        return $ts;
    }

    public function order(string $customerId, []$productIds): string{
        try {
            $result = $this->orderService->CreateOrder($customerId, $productIds);
            echo "hello tavern order";

        } catch (CustomerNotFoundException|ProductNotFoundException $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
}
