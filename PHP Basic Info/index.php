<?php
  $name = "Web Developer";
  $number = 21;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Lorem Ipsum</h3>
    <p>Hello, <?= $name; ?> </p>
    <?php if ($number == 21): ?>
      Happy Birthday Developer
    <?php else: ?>
      Oh hiii
    <?php endif; ?>
  </body>
</html>
