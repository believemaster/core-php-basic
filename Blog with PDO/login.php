<?php
require('classes/Url.php');
require 'classes/User.php';
require 'classes/Database.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $db = new Database();
  $conn = $db->getConn();

  if(User::authenticate($conn, $_POST['username'], $_POST['password'])) {

    session_regenerate_id(true);

    $_SESSION['is_logged_in'] = true;

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
