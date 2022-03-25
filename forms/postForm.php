<?php

if($_SERVER["REQUEST_METHOD"] = "POST") {
  var_dump($_POST);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">   <!-- method=get sends the data to url which can be accessed in browser by default is get -->

      <input name="username">
      <input name="password" type="password">

      <button type="submit">Submit</button>
    </form>
  </body>
</html>

<!-- For browser support check: caniuse.com and html5please -->


<!-- WHich method to use -->
<!--

get = for bookmark, and there is size limit for url but not for sensitive data like password etc.

post = for sensitive data like username password and there is no size limit

 -->
