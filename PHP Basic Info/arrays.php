<?php

# Array = list of other values
$arrayType1 = [
  "first",
  "another",
  "third"
];

$arrayType2 = array(
  "four",
  "five",
  "six"
);

var_dump($arrayType1);
echo "<br>";
var_dump($arrayType2);

# Printing indivisual element
echo "<br>";
echo "<br><b>Array with indivisual element:</b><br>";
var_dump($arrayType2[2]);

echo "<br>";
echo "<br>";

# Array with index
$arrayWithIndex = [
  1 => "first",
  2 => "second",
  3 => "third"
];
/* if index is string then it is called as associative array eg:
$arrayWithIndex = [
  "one" => "first",
  "two" => "second",
  "three" => "third"
];
*/

echo "<br><b>Array with custom index:</b><br>";
var_dump($arrayWithIndex);

echo "<br>";
echo "<br>";

# Singledimenssional Array
$count = 4;
$prices = 9.99;

$values = [
  $count, $prices
];

var_dump($values);

# Multidimenssional Array

$person1 = [
  "name" => "abc",
  "age" => 32,
  "email" => "abc@gmail.com"
];

$person2 = [
  "name" => "pqr",
  "age" => 34,
  "email" => "pqr@gmail.com"
];

$person3 = [
  "name" => "xyz",
  "age" => 31,
  "email" => "xyz@gmail.com"
];

$users = [
  $person1, $person2, $person3
];

var_dump($users);
echo "<br>";
echo "<br><b>GettingElement From Multidimenssional Array:</b><br>";

var_dump($users[0]);
echo "<br>";
var_dump($users[1]["name"]);
echo "<br>";

# Looping
echo "<br><b>Looping Array:</b><br>";
$articles = ["First", "Second", "Third"];
foreach($articles as $article)
{
  echo $article . ", <br>";
}
#with index
echo "<br><b>Looping Array with Index:</b><br>";
$articlesWithIndex = [
  0 => "First",
  1 => "Second",
  2 => "Third"
];
foreach($articles as $index=>$article)
{
  echo $index . ' - ' . $article . ", <br>";
}
