<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Blog</title>
  </head>
  <body>
    <header>
      <h1>My Blogs</h1>
    </header>
    <nav>
      <ul>
        <?php if(Auth::isLoggedIn()) : ?>
          <li><a href="/Blog with PDO/">Home</a> </li>
          <li><a href="/Blog with PDO/admin/">Admin</a> </li>
          <li><a href="/Blog with PDO/logout.php">Log Out</a> </li>
        <?php else: ?>
          <li><a href="/Blog with PDO/login.php">Log In</a> </li
        <?php endif; ?>
      </ul>
    </nav>
    <main>
