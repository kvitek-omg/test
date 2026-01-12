<?php
require_once 'Passenger.php';
require_once 'Car.php';

$mojeAuto = new Car("Mercedes", 2);

$mojeAuto->startEngine();

$ja = new Passenger("Jakub");
$klient = new Passenger("High Ticket Klient");
$chudy = new Passenger("Lowballer");

$mojeAuto->board($ja);      
$mojeAuto->board($klient);  
$mojeAuto->board($chudy); 