<?php
  /*
  * Database
  *
  * A connection to database
  */
  class Database
  {
    /*
    * Hostname
    * @var string
    */
    protected $db_host;

    /*
    * Database name
    * @var string
    */
    protected $db_name;

    /*
    * Username
    * @var string
    */
    protected $db_user;

    /*
    * Password
    * @var string
    */
    protected $db_pass;

    /*
    * Constructor
    *
    * @param string $host hostname
    * @param string $name Databse name
    * @param string $user Username
    * @param string $password Password
    */
    public function __construct($host, $name, $user, $password)
    {
      $this->db_host      = $host;
      $this->db_name      = $name;
      $this->db_user      = $user;
      $this->db_pass      = $password;
    }

    /*
    * Get the database Connection
    *
    * @return PDO object connection to the database
    */
    public function getConn()
    {
      try {

        $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8';

        $db = new PDO($dsn, $this->db_user, $this->db_pass);

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
