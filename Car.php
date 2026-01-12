<?php
require_once 'Vehicle.php'; // Načtení rodiče

class Car extends Vehicle {
    public int $seats;
    public array $passengers = [];

    public function __construct(string $brand, int $seats) {
        // Tady voláš rodiče - tohle je v zadání POVINNÉ
        parent::__construct($brand);
        $this->seats = $seats;
    }

    public function board(Passenger $passenger): bool {
        if (count($this->passengers) >= $this->seats) {
            echo "Smůla, pro {$passenger->name} už není místo.\n";
            return false;
        }

        $this->passengers[] = $passenger;
        echo "{$passenger->name} nastoupil do auta.\n";
        return true;
    }
}