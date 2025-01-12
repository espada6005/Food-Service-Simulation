<?php

namespace FoodItems;

abstract class FoodItem {

    private string $name;
    private string $description;
    private float $price;
    private int $estimatedTimeInMinutes;

    public function __construct(string $name, string $description, float $price, int $estimatedTimeInMinutes) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
    }

    abstract public static function getCategory(): string;

    public function getPrice(): float {
        return $this->price;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEstimatedTimeInMinutes(): int {
        return $this->estimatedTimeInMinutes;
    }

}