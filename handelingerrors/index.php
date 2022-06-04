<?php

// Error handler function
function errorHandeler($level, $message, $file, $line) {
  throw new ErrorException($message, 0, $level, $file, $line);
}

set_error_handler('errorHandler');
// $i = 10/0;

// Exception hander function
function exceptionHandler($exception) {
  echo 'Caught exception: ', $exception->getMessage();
}
set_exception_handler('exceptionHandler');

$i = 10/0;

// Try Catch block
  // try {
  //   $dateTime = new DateTime('invalid');
  // } catch (Throwable $e) {
  //   echo 'Caught: ', $e->getMessage();
  // }

 ?>
