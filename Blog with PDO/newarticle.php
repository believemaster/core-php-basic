<?php

  require('include/init.php');

  if( ! Auth::isLoggedIn()) {
    die("unauthorized");
  }

  $article = new Article();

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = require('include/db.php');

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    if ($article->create($conn))
    {
      Url::redirect("/Blog with PDO/article.php?id={$article->id}");
    }

  }

?>

<?php require('include/header.php') ?>

<h2>New Article</h2>

<?php require('include/articleform.php') ?>

<?php require('include/footer.php') ?>
