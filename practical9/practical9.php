<?php
include('header.php');

$person = ["name" => "John", "age" => 25];
$number = 7; 
$numbers = [1, 2, 3, 4, 5];

function greet($person) { return "Hello, {$person['name']}. You are {$person['age']} years old."; }
function checkNumberAndPrintWeather($number) { return $number % 2 == 0 ? "The number $number is even. The weather is sunny." : "The number $number is odd. The weather is rainy."; }

echo greet($person) . "<br>" . checkNumberAndPrintWeather($number) . "<br>Numbers in the numeric array: " . implode(" ", $numbers) . "<br>";

require('footer.php');
?>
