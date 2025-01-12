<?php

namespace FoodItems;

class Fettuccine extends FoodItem {

    public const CATEGORY = "Pasta";

    public function __construct() {
        parent::__construct("Fettuccine", "This is Fettuccine", 4.5, 10);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
    
}