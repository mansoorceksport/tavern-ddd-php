<?php
namespace Mansoor\TavernDddPhp\Application\Service\Tavern;

use Mansoor\TavernDddPhp\Application\Service\Cart\CartService;
use Mansoor\TavernDddPhp\Application\Service\Order\OrderService;
use Mansoor\TavernDddPhp\Domain\Repository\Customer\Exception\CustomerNotFoundException;
use Mansoor\TavernDddPhp\Domain\Repository\Product\Exception\ProductNotFoundException;

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

    public function order(string $customerId, CartService $cartService): string{
        try {
            $result = $this->orderService->CreateOrder($customerId, $cartService->getProducts());
        } catch (CustomerNotFoundException|ProductNotFoundException $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
}
