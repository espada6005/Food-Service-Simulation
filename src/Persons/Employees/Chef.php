<?php

namespace Persons\Employees;

use FoodOrders\FoodOrder;

class Chef extends Employee {

    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }

    public function prepareFood(FoodOrder $foodOrder): void {
        $foodItems = $foodOrder->getItems();
        $totalTime = 0;

        for ($i = 0; $i < count($foodItems); $i++) {
            $totalTime += $foodItems[$i]->getEstimatedTimeInMinutes();
        }

        for ($i = 0; $i < count($foodItems); $i++) {
            echo "{$this->getName()} was cooking {$foodItems[$i]->getName()}", PHP_EOL;
        }

        echo "{$this->getName()} took {$totalTime} minutes to cook.", PHP_EOL;
    }

}