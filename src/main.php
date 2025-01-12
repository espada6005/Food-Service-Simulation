<?php
spl_autoload_extensions(".php");
spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $file = __DIR__ . '/' . $className . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

$chesseBurger = new \FoodItems\CheeseBurger();
$fettuccine = new \FoodItems\Fettuccine();
$hawaiianPizza = new \FoodItems\HawaiianPizza();
$spaghetti = new \FoodItems\Spagetti();

$Inayah = new \Persons\Employees\Chef("Inayah Lozano", 40, "Osaka", 1, 30);
$Nadia = new \Persons\Employees\Cashier("Nadia Valentine", 21, "Tokyo", 1, 20);

$saizeriya = new \Restaurants\Restaurant(
    [
        $chesseBurger,
        $fettuccine,
        $hawaiianPizza,
        $spaghetti,
    ],
    [
        $Inayah,
        $Nadia
    ]
);

$interestedTastesMap = [
    "Margherita" => 1,
    "CheeseBurger" => 2,
    "Spagetti" => 1
];

$Tom = new \Persons\Customers\Customer("Tom", 20, "Saitama", $interestedTastesMap);

$invoice = $Tom->order($saizeriya);
$invoice->printInvoice();