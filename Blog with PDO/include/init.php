<?php

/**
* Initialization
*
* Register an autoloader, start or resume the sesion etc.
*/

spl_autoload_register(function($class) {
  require dirname(__DIR__) . "/classes/{$class}.php";
});


session_start();

require dirname(__DIR__) . '/config.php';

function errorHandeler($level, $message, $file, $line) {
  throw new ErrorException($message, 0, $level, $file, $line);
}

function exceptionHandler($exception)
{
  http_response_code(500);
  
  if(SHOW_ERR_DETAIL) {
    echo "<h1>An error occured.</h1>";
    echo "<p>Uncaught Exception: " . get_class($exception) . "</p>";
    echo "<p>" . $exception->getMessage() . "</p>";
    echo "<p> Stack Trace: <pre>" . $exception->getTraceAsString() . "</pre></p>";
    echo "<p> In file '" . $exception->getFile() . "' on line ". $exception->getLine() ."</p>";

    exit();
  } else {
    echo "<h1>An error occured.</h1>";
    echo "<p>Please try later.</p>";
  }
}

set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');
