<?php

require('include/init.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $conn = require('include/db.php');

  if(User::authenticate($conn, $_POST['username'], $_POST['password'])) {

    Auth::login();

    Url::redirect('/Blog with PDO/');
  } else {
    $error = 'Login Incorrect';
  }
}

 ?>

 <?php require 'include/header.php'; ?>

 <h2>Login</h2>

 <?php if (! empty($error)): ?>
   <p style="color: red;"><?= $error ?></p>
 <?php endif; ?>

 <form action="" method="post">
   <div class="form-group">
     <label for="username">Username</label>
     <input class="form-control" id="username" type="text" name="username" value="">
   </div>

   <div class="form-group">
     <label for="password">Username</label>
     <input class="form-control" id="password" type="password" name="password" value="">
   </div>

   <button class="btn btn-outline-dark" type="submit" name="button">Login</button>
 </form>
