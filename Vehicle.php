<?php
class Vehicle {
    public string $brand;
    public bool $engineOn;

    public function __construct(string $brand) {
        $this->brand = $brand;
        $this->engineOn = false;
    }

    public function startEngine(): void {
        $this->engineOn = true;
        echo "Motor naskočil (vrrrr).\n";
    }
}
