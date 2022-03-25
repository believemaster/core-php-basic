<?php
# check levels at php-fig.org to check php standards to write clean and easy to read code using PSR2 standard
# to fix your php standards check phpio.net
# sensiolabs.org will be installed in code and fix the code into php standard

# variables are container that hold the data
/*
  $msgherem, $msgHere, msg_here, $msg123
  Also PHP is case sensative and loosely type therefore we can contain any type data in variables
  variables can contains numbers, strings, floats, boolean, null too
*/

$msg = "new Programmer";    // variable containing string
$number = 21;
$null = null;
$boolean = true;
$float = 2.1;

echo "Hellow World ". $msg . " & your number is ". $number;

echo "<br><b>Var Dump of varibale below: </b><br>";

var_dump($msg, $number, $null, $boolean, $float);

echo "<br>";
/*
  <?php echo ?>
  <?= ?> are same
*/
echo "<br>";

# Operators (+, -, *, /, %)
# Booleans (!, &&, ||, xor, and, or)

$price = 34.5;
$qty =  4;

$amt = $price * $qty;
echo "Amount here is: ". $amt . "<br/>";
var_dump($amt);

echo "<br>";

#typeconversion in PHP called Type Juggling - automatically done by php when required
$stringNumber = "150";
$number = 3;

$result = $stringNumber * $number;

echo "<br>Type Juggling Result ". $result . "<br/>";
var_dump($result);

echo "<br>";

$weekDays = "Monday\nTuesday\nWednesday";
echo "here are 3 days {$weekDays}"; // use interpolation {$var} if you're concatination strings



?>
