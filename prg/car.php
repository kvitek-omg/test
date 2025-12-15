<?php

class Car {
    public string $brand;
    public int $seats;
    public bool $engineOn;

    public array $passengers = [];

    public function __construct(string $brand, int $seats) {
        $this->brand = $brand;
        $this->seats = $seats;
        $this->engineOn = false;
    }

    public function startEngine(): void {
        $this->engineOn = true;
    }

    public function board(Passenger $passenger): bool {
        if (count($this->passengers) >= $this->seats) {
            return false; // plno
        }

        $this->passengers[] = $passenger;
        return true;
    }
}