<?php

namespace FoodItems;

class CheeseBurger extends FoodItem {

    public const CATEGORY = "Burger";

    public function __construct() {
        parent::__construct("CheeseBurger", "This is CheeseBurger", 6, 5);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }

}
