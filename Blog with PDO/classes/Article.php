<?php

  /*
  * Article
  * A piece of writing for publication
  */

  class Article
  {
    /*
    * Uniqu Identifier
    * @var Integer
    */
    public $id;

    /*
    * The article title
    * @var string
    */
    public $title;

    /*
    * The article content
    * @var string
    */
    public $content;

    /*
    * The publication date and time
    * @var datetime
    */
    public $published_at;

    /*
    * Validatoin Error
    * @var array
    */
    public $errors = [];

    /*
    * Get all the article
    *
    * @param object $conn Connection to database
    *
    * @return array an Associative array of all the article records
    */
    public static function getAll($conn) {

      $sql = "SELECT *
              FROM article
              ORDER BY published_at DESC;";

      $results = $conn->query($sql);

      return $results->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
    * GET the article record based on the ID
    *
    * @param object $conn Connection tothe database
    * @param integer $id the article ID
    * @param string $columns optional list of columns for the select, defaults to *
    *
    * @return mixed An object of this class, or null if not found
    */

    public static function getById($conn, $id, $columns = "*")
    {
        $sql = "SELECT $columns
                FROM article
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

        if($stmt->execute())
        {
          return $stmt->fetch();
        }
    }

    /**
    * Update the articel with its current property values
    *
    * @param object $conn Connection to the database
    *
    * @return boolean True if the update was successful, false otherwise
    */
    public function update($conn)
    {
      if($this->validate()) {

          $sql = "UPDATE article
                  SET title = :title,
                      content = :content,
                      published_at = :published_at
                  WHERE id = :id";

          $stmt = $conn->prepare($sql);

          $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
          $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
          $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

          if($this->published_at == '') {
            $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
          } else {
            $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
          }
          return $stmt->execute();
      } else {
        return false;
      }
    }

    /**
    * GET the properties, putting any validation error message in $errors property
    *
    * @return boolean True if the current properties are validd, false otherwise
    */
    protected function validate()
    {
      if($this->title == '') {
        $this->errors[] = "Title is required.";
      }

      if($this->content == '') {
        $this->errors[] = "Content is required.";
      }

      // Validation of published date
      if($this->published_at != '') {
        $date_time = date_create_from_format('Y-m-d H:i:s', $this->published_at);

        if($date_time == false) {
          $this->errors[] = "Invalid date and time";
        } else {
          $date_errors = date_get_last_errors();

          if($date_errors['warning_count'] > 0) {
            $this->errors[] = "Invalid date and time.";
          }
          }
        }

        return empty($this->errors);
    }

    /**
    * Delete the current article
    *
    * @param object $conn connection to the database
    *
    * @return boolean True if delete successful else false
    */
    public function delete($conn) {
      $sql = "DELETE FROM article
              WHERE id = :id";

      $stmt = $conn->prepare($sql);

      $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

      return $stmt->execute();
    }

    /**
    * Create the current article
    *
    * @param object $conn connection to the database
    *
    * @return boolean True if articel created successfully else false
    */
    public function create($conn) {
      if($this->validate()) {

          $sql = "INSERT INTO article (title, content, published_at)
                  VALUES (:title, :content, :published_at)";

          $stmt = $conn->prepare($sql);

          $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
          $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

          if($this->published_at == '') {
            $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
          } else {
            $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
          }
          if($stmt->execute()) {
            $this->id = $conn->lastInsertId();
          } else {
            return false;
          }
      } else {
        return false;
      }
    }

  }

 ?>