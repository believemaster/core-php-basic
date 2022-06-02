<?php

/**
  * Category
  *
  * Groupings for articles
*/

class Category
{
  /*
  * Get all the category
  *
  * @param object $conn Connection to database
  *
  * @return array an Associative array of all the category records
  */
  public static function getAll($conn) {

    $sql = "SELECT *
            FROM category
            ORDER BY name;";

    $results = $conn->query($sql);

    return $results->fetchAll(PDO::FETCH_ASSOC);

  }
}


?>
