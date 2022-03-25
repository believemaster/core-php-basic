<?php
// Session is used to remeber that we have be here before stored in server
// Session data us written to a file which can be slow therefore only boolean value is stored

  session_start();  // this line should be called before any other content because sesion uses cookies and cookie data is sent in headers

  if(isset($_SESSION['count'])) {
      $_SESSION['count']++;
  } else {
      $_SESSION['count'] = 1;
  }

  var_dump($_SESSION['count']);

 ?>
