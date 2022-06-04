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
    * Path of the image
    * @var string
    */
    public $image_file;

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

    /*
    * Get a page of Article
    *
    * @param object $conn Connection to the database
    * @param integer $limit number of records to return
    * @param integer $offset number of records to skip
    *
    * @return array An associative array of page of article records
    */
    public static function getPage($conn, $limit, $offset, $only_published = false) {

      $condition = $only_published ? ' WHERE published_at IS NOT NULL' : '';

      $sql = "SELECT a.*, category.name AS category_name
              FROM (SELECT *
                    FROM article
                    $condition
                    ORDER BY published_at
                    LIMIT :limit
                    OFFSET :offset) AS a
              LEFT JOIN article_category
              ON a.id = article_category.article_id
              LEFT JOIN category
              ON article_category.category_id = category.id";

      $stmt = $conn->prepare($sql);

      $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

      $stmt->execute();

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $articles = [];
      $previous_id = null;

      foreach($results as $row) {
        $article_id = $row['id'];
        if($article_id != $previous_id) {
          $row['category_names'] = [];
          $articles[$article_id] = $row;
        }

        $articles[$article_id]['category_names'][] = $row['category_name'];

        $previous_id = $article_id;
      }

      return $articles;
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
    * Get article record based on the ID along with associated categories, if any
    *
    * @param object $conn Connection to the database
    * @param integer $id the article ID
    *
    * @return array The article data with categories
    */
    public static function getWithCategories($conn, $id, $only_published = false)
    {
      $sql = "SELECT article.*, category.name AS category_name
              FROM article
              LEFT JOIN article_category
              ON article.id = article_category.article_id
              LEFT JOIN category
              ON article_category.category_id = category.id
              WHERE article.id = :id";

      if($only_published) {
        $sql .= ' AND article.published_at IS NOT NULL';
      }

      $stmt = $conn->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);

      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
    * Get the articles category
    *
    * @param object $conn Connection to the database
    *
    * @return array The category data
    */
    public function getCategories($conn) {
      $sql = "SELECT category.*
              FROM category
              JOIN article_category
              ON category.id = article_category.category_id
              WHERE article_id = :id";

      $stmt = $conn->prepare($sql);
      $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    * Set the article categories
    *
    * @param object $conn Connection to the database
    * @param array $ids Category IDs
    *
    * @return void
    */
    public function setCategories($conn, $ids)
    {
      if($ids) {
        $sql = "INSERT IGNORE INTO article_category (article_id, category_id)
                VALUES ";

        $values = [];

        foreach($ids as $id) {
          $values[] = "({$this->id}, ?)";
        }

        $sql .= implode(", ", $values);

        $stmt = $conn->prepare($sql);

        foreach($ids as $i => $id) {
          $stmt->bindValue($i + 1, $id, PDO::PARAM_INT);
        }
        $stmt->execute();
      }

      $sql = "DELETE FROM article_category
              WHERE article_id = {$this->id}";

      if($ids) {
        $placeholders = array_fill(0, count($ids), '?');
        $sql .= " AND category_id NOT IN (" . implode(", ", $placeholders) . ")";
      }

      $stmt = $conn->prepare($sql);

      foreach($ids as $i => $id) {
        $stmt->bindValue($i + 1, $id, PDO::PARAM_INT);
      }

      $stmt->execute();
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

    /*
    * Get a count of the total number of records
    *
    * @param object $conn Connection to the database
    *
    * @return integer the total number of records
    */
    public static function getTotal($conn, $only_published = false)
    {
      $condition = $only_published ? ' WHERE published_at IS NOT NULL' : '';

      return $conn->query("SELECT COUNT(*) FROM article$condition")->fetchColumn();
    }

    /*
    * Update the image file property
    *
    * @param object $conn connection to the database
    * @param string $filename the filename of the image file
    *
    * @return boolean True if it was successful false other wise.
    */
    public function setImageFile($conn, $filename)
    {
      $sql = "UPDATE article
              SET image_file = :image_file
              WHERE id = :id";

      $stmt = $conn->prepare($sql);

      $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
      $stmt->bindValue(':image_file', $filename, $filename == null ? PDO::PARAM_NULL : PDO::PARAM_STR);

      return $stmt->execute();
    }

  }

 ?>
