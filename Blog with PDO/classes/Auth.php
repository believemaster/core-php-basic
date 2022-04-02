<?php

  /*
  * Authentication Login and Logut
  */

  class Auth
  {
    /**
    * Return the user authentication status
    *
    * @return boolean True if a user is logged in, false otherwise
    */

      public static function isLoggedIn()
      {
        return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
      }

      /**
      * Require the user to be logged in, stopping with unauthorized message if not
      *
      * @return void
      */

      public static function requireLogin()
      {
        if( ! Auth::isLoggedIn()) {
          die("unauthorized");
        }
      }

      /**
      * Login using the session
      *
      * @return void
      */
      public static function login()
      {
        session_regenerate_id(true);

        $_SESSION['is_logged_in'] = true;
      }

      /**
      * Logout using the session
      *
      * @return void
      */
      public static function logout()
      {
        $_SESSION = array();

        if(ini_get("session.use_cookies")) {
          $param = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
          $param['path'], $param['domain'],
          $param['secure'], $param['httponly']
        );
        }

        session_destroy();
      }
  }

 ?>
