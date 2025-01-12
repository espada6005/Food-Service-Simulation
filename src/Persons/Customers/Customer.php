<?php

namespace Persons\Customers;

use Invoices\Invoice;
use Persons\Person;
use Restaurants\Restaurant;

class Customer extends Person {
    
    private array $interestedTastesMap;

    public function __construct(string $name, int $age, string $address, array $interestedTastesMap) {
        parent::__construct($name, $age, $address);
        $this->interestedTastesMap = $interestedTastesMap;
    }

    public function interestedCategorie(Restaurant $restaurant): array {
        $menu = $restaurant->getMenu();
        $keys = array_keys($this->interestedTastesMap);
        $orderMenu = [];

        for($i = 0; $i < count($menu); $i++){
            if (in_array($menu[$i]->getName(), $keys)) {
                $orderMenu[$menu[$i]->getName()] = $this->interestedTastesMap[$menu[$i]->getName()];
            }
        }

        return $orderMenu;
    }

    public function getOrderMenu(Restaurant $restaurant): array {
        $menu = $restaurant->getMenu();
        $keys = array_keys($this->interestedTastesMap);
        $orderMenu = [];

        for($i = 0; $i < count($menu); $i++){
            if (in_array($menu[$i]->getName(), $keys)) {
                $itemCount = $this->interestedTastesMap[$menu[$i]->getName()];
                for ($j = 0; $j < $itemCount; $j++) {
                    array_push($orderMenu, $menu[$i]);
                }
            }
        }

        return $orderMenu;
    }

    public function order(Restaurant $restaurant): Invoice {
        $keys = array_keys($this->interestedTastesMap);
        $keyString = implode(", ", $keys);
        $orderMenu = $this->interestedCategorie($restaurant);
        $foodItems = $this->getOrderMenu($restaurant);
        $foodOrder = new \FoodOrders\FoodOrder($foodItems);

        echo "{$this->name} wanted to eat {$keyString}", PHP_EOL;
        echo "{$this->name} was looking at the menu, and ordered ";
        foreach ($orderMenu as $key => $value) {
            echo "{$key} x {$value} ";
        }
        echo PHP_EOL;

        return $restaurant->order($foodOrder);
    }

}