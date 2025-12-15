<?php

class Passenger {
    public string $name;
    public int $age;
    public bool $hasTicket;

    public function __construct(string $name, int $age, bool $hasTicket = true) {
        $this->name = $name;
        $this->age = $age;
        $this->hasTicket = $hasTicket;
    }

    public function buyTicket(): void {
        $this->hasTicket = true;
    }
}