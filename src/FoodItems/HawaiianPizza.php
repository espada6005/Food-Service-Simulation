<?php

namespace FoodItems;

class HawaiianPizza extends FoodItem {

    public const CATEGORY = "Pizza";

    public function __construct() {
        parent::__construct("HawaiianPizza", "This is HawaiianPizza", 6.5, 15);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}