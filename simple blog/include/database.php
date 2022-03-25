<?php

    $db_host = "localhost";
    $db_name = "core_php_cms";
    $db_user = "core_php_cms";
    $db_pass = "iou[x_3l4xtgk]Ny";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);   // Connect witht database

    // Connection error if any
    if(mysqli_connect_error()) {
      echo mysqli_connect_error();
      exit;
    }

?>
