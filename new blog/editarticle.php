<?php

require('include/database.php');
require('include/article.php');
require('include/url.php');

$conn = getDB();

if(isset($_GET['id']))
{
  $article = getArticle($conn, $_GET['id']);

  if($article) {

    $id = $article['id'];
    $title = $article['title'];
    $content = $article['content'];
    $published_at = $article['published_at'];

  } else {
    die("Article not found");
  }

} else {
  die("id not supplied, article not found");
}

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

    $errors = validateArticle($title, $content, $published_at);

    if(empty($errors)) {

      $sql = "UPDATE article
              SET title=?, content=?, published_at=?
              WHERE id=?";

      // PREPARE
      $stmt = mysqli_prepare($conn, $sql);

      if($stmt === false) {
        echo mysqli_error($conn);
        } else {
          if($published_at = '') {
            $published_at = null;
          }

          // BIND
          mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $published_at, $id);

          // EXECUTE
          if(mysqli_stmt_execute($stmt)) {

              redirect("/new blog/article.php?id=$id");

              } else {
                echo mysqli_stmt_error($stmt);
              }
            }
        }
    }

?>

<?php require('include/header.php') ?>

<h2>Edit Article</h2>

<?php require('include/articleform.php') ?>

<?php require('include/footer.php') ?>
