<?php

namespace Invoices;

class Invoice {
    
    private float $finalPrice;
    private string $orderTime;
    private int $estimatedTimeInMinutes;

    public function __construct(float $finalPrice, string $orderTime, int $estimatedTimeInMinutes) {
        $this->finalPrice = $finalPrice;
        $this->orderTime = $orderTime;
        $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
    }

    public function printInvoice(): void {
        echo "-------------------------------", PHP_EOL;
        echo "Date: {$this->orderTime}", PHP_EOL;
        echo "Final Price: \${$this->finalPrice}", PHP_EOL;
        echo "-------------------------------", PHP_EOL;
    }

    public function getEstimatedTimeInMinutes(): int {
        return $this->estimatedTimeInMinutes;
    }

}