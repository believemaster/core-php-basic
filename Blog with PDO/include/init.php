<?php

/**
* Initialization
*
* Register an autoloader, start or resume the sesion etc.
*/

spl_autoload_register(function($class) {
  require "classes/{$class}.php";
});


session_start();
