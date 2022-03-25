<?php
require 'include/url.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  if($_POST['username'] == 'secret' && $_POST['password'] == 'secret') {

    session_regenerate_id(true);

    $_SESSION['is_logged_in'] = true;

    redirect('/new blog/');
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
   <div>
     <label for="username">Username</label>
     <input id="username" type="text" name="username" value="">
   </div>

   <div>
     <label for="password">Username</label>
     <input id="password" type="password" name="password" value="">
   </div>

   <button type="submit" name="button">Login</button>
 </form>
