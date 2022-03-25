<?php
# Control Structure
/*
  if else, switch, loops
*/

#if else
if(true)    // false won't show
{
  echo "This is true condtion";
}

echo "<br>";

$articles = [];
var_dump(empty($articles));
echo "<br>";

$articles2 = [
  "article1",
  "article2",
  "article3"
];

if(empty($articles2))
{
  echo "Array is empty!";
} else {
  foreach($articles2 as $article)
  {
    echo $article . ", <br>";
  }
}
echo "<br>";

#comparision of values
var_dump(4 == 4);
var_dump(3 == 2);
var_dump(3 < 2);
var_dump(3 > 2);
var_dump(3 >= 2);
var_dump(3 <= 2);

echo "<br>";

$age = 23;
if($age == 23) {
  echo "Conditioin is true";
} else {
  echo "Not true";
}
echo "<br>";
echo "<br>";


# Loops control structure
// for, foreach, while, do while
$month = 1;
while($month <= 12){
  echo $month . " month, <br>";
  $month = $month +1;
}

echo "<br>";

for($i=1; $i<=10; $i++)
{
  echo "count " . $i;
}

echo "<br>";
echo "<br>";

// else if continue and break eg:
for($i=1; $i<=10; $i++)
{
  if($i == 4) {
    continue;
  }
  else if ($i == 7) {
    break;
  }
  echo "count " . $i;
}

echo "<br>";

// switch statement is similar to if else
$day = "mon";

switch($day)
{
  case "sat":
    echo "Monday";
    break;

  case "tues":
    echo "Tuesday";
    break;

  case "wed":
    echo "Monday";
    break;

  default:
    echo "Other day of week maybe";
    break;
}
