<?php

include "Passenger.php";
include "Car.php";

$car = new Car("Škoda", 2);

$p1 = new Passenger("Petr", 18, true);
$p2 = new Passenger("Anna", 17, false);
$p3 = new Passenger("Karel", 30, true);

$car->startEngine();

if (!$p2->hasTicket) {
    $p2->buyTicket();
}

echo "Auto: {$car->brand}, sedadel: {$car->seats}\n";
echo "Motor zapnut: " . ($car->engineOn ? "ano" : "ne") . "\n\n";

echo "Nastupování:\n";

echo "- {$p1->name}: " . ($car->board($p1) ? "nastoupil" : "není místo") . "\n";
echo "- {$p2->name}: " . ($car->board($p2) ? "nastoupila" : "není místo") . "\n";
echo "- {$p3->name}: " . ($car->board($p3) ? "nastoupil" : "není místo") . "\n";

echo "\nSeznam cestujících v autě:\n";
foreach ($car->passengers as $p) {
    echo "- {$p->name}, {$p->age} let, lístek: " . ($p->hasTicket ? "ano" : "ne") . "\n";
}