<?php

require('../include/init.php');

Auth::requireLogin();

$conn = require('../include/db.php');

if(isset($_GET['id']))
{
  $article = Article::getById($conn, $_GET['id']);

  if(! $article) {
    die("Article Not Found!");
  }
} else {
  die("id not supplied, article not found");
}

  $category_ids = array_column($article->getCategories($conn), 'id');
  $categories = Category::getAll($conn);
  // var_dump($categories);

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    $category_ids = $_POST['category'] ?? []; // NUll coalase operator to set this to empty array if it doesn't exist in POST array


    if ($article->update($conn))
    {
      $article->setCategories($conn, $category_ids);
      Url::redirect("/Blog with PDO/admin/article.php?id={$article->id}");
    }
  }

?>

<?php require('../include/header.php') ?>

<h2>Edit Article</h2>

<?php require('include/articleform.php') ?>

<?php require('../include/footer.php') ?>
