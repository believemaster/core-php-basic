<?php

  setcookie('example', 'Hello COOKIE', time() + 60 * 60 * 24 * 2); // cookie will expire in 2 days

  echo "Cookie SET";

 ?>
