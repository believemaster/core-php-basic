<?php

  require('../include/init.php');

  Auth::requireLogin();

  $article = new Article();

  $category_ids = [];

  $conn = require('../include/db.php');

  $categories = Category::getAll($conn);

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    $category_ids = $_POST['category'] ?? []; // NUll coalase operator to set this to empty array if it doesn't exist in POST array

    if ($article->create($conn))
    {
      $article->setCategories($conn, $category_ids);
      Url::redirect("/Blog with PDO/admin/article.php?id={$article->id}");
    }

  }

?>

<?php require('../include/header.php') ?>

<h2>New Article</h2>

<?php require('include/articleform.php') ?>

<?php require('../include/footer.php') ?>
