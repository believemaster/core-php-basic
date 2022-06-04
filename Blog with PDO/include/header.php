<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  </head>
  <body>
    <div class="container">
    <header>
      <h1>My Blogs</h1>
    </header>
    <nav>
      <ul class="nav">
        <li class="nav-item"><a href="/Blog with PDO/" class="nav-link">Home</a> </li>
        <?php if(Auth::isLoggedIn()) : ?>
          <li class="nav-item"><a href="/Blog with PDO/admin/" class="nav-link">Admin</a> </li>
          <li class="nav-item"><a href="/Blog with PDO/logout.php" class="nav-link">Log Out</a> </li>
        <?php else: ?>
          <li class="nav-item"><a href="/Blog with PDO/login.php" class="nav-link">Log In</a> </li>
        <?php endif; ?>
        <li class="nav-item"><a href="/Blog with PDO/contact.php" class="nav-link">Contact</a> </li>
      </ul>
    </nav>
    <main>
