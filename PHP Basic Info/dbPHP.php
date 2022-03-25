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

// SQL query
$sql = "SELECT *
        FROM article
        ORDER BY published_at;";

// Result the sql query
$results = mysqli_query($conn, $sql);

if($results === false) {
  echo mysqli_error($conn);
} else {
  $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);   // Gives associative array of the data

  var_dump($articles);
}

?>
