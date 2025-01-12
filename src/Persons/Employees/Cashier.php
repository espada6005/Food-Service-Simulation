<?php

namespace Persons\Employees;

use FoodOrders\FoodOrder;
use Invoices\Invoice;

class Cashier extends Employee {

    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary)
    {
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }

    public function generateOrder(): void
    {
        echo $this->getName() . " recieved the order.\n";
    }

    public function generateInvoice(FoodOrder $foodOrder): Invoice
    {
        echo $this->getName() . " made the invoice.\n";

        $foodItems = $foodOrder->getItems();
        $orderTime = $foodOrder->getOrderTime();
        $totalPrice = 0;
        $totalTime = 0;

        for ($i = 0; $i < count($foodItems); $i++) {
            $totalPrice += $foodItems[$i]->getPrice();
            $totalTime += $foodItems[$i]->getEstimatedTimeInMinutes();
        }

        return new \Invoices\Invoice($totalPrice, $orderTime, $totalTime);

    }
}