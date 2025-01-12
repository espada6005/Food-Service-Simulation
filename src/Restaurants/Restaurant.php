<?php

namespace Restaurants;

use FoodOrders\FoodOrder;
use Invoices\Invoice;

class Restaurant {
    private array $menu;
    private array $employees;

    public function __construct(array $menu, array $employees) {
        $this->menu = $menu;
        $this->employees = $employees;
    }

    public function getMenu(): array {
        return $this->menu;
    }

    public function getEmployees(): array {
        return $this->employees;
    }

    public function order(FoodOrder $foodOrder): Invoice
    {
        $employees = $this->getEmployees();

        for ($i = 0; $i < count($employees); $i++) {
            $fullClassName = get_class($employees[$i]);
            $className = basename(str_replace("\\", "/", $fullClassName));
            if ($className == "Chef") {
                $chef = $employees[$i];
            } elseif ($className == "Cashier") {
                $cashier = $employees[$i];
            }
        }

        $cashier->generateOrder();

        $chef->prepareFood($foodOrder);

        return $cashier->generateInvoice($foodOrder);
    }
    
}