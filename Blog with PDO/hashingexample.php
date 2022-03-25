<?php

  $password = 'secret';

  // $hash = password_hash($password, PASSWORD_DEFAULT);  // hashing the password

  // echo $hash;

  $hash = "$2y$10$.K7F43uPhy.Q.r5xQpoJfuYeMqRiR4E3sUvGG6z9cCDm2szfOJN6e";

  var_dump(password_verify($password, $hash));

 ?>
