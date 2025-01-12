<?php

namespace FoodItems;

class Spagetti extends FoodItem {
    public const CATEGORY = "Pasta";

    public function __construct() {
        parent::__construct("Spagetti", "This is Spagetti", 5, 10);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}