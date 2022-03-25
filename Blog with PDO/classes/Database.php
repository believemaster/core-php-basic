<?php

  class Database
  {
    /*
    * Get the database Connection
    *
    * @return PDO object connection to the database
    */

    public function getConn()
    {
      try {
        $db_host = "localhost";
        $db_name = "core_php_cms";
        $db_user = "core_php_cms";
        $db_pass = "iou[x_3l4xtgk]Ny";

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

        $db = new PDO($dsn, $db_user, $db_pass);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
      }
      catch (PDOException $e) {
        echo $e->getMessage();
        exit;
      }
    }
  }

 ?>
