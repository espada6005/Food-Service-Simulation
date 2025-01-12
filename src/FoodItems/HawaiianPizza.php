<?php

namespace FoodItems;

class HawaiianPizza extends FoodItem {

    public const CATEGORY = "Pizza";

    public function __construct() {
        parent::__construct("HawaiianPizza", "This is HawaiianPizza", 10.5, 15);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}