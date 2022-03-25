<?php

require('include/database.php');
require('include/article.php');
require('include/url.php');

$conn = getDB();

if(isset($_GET['id']))
{
  $article = getArticle($conn, $_GET['id'], 'id');

  if($article) {

    $id = $article['id'];

  } else {
    die("Article not found");
  }

} else {
  die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $sql = "DELETE FROM article
          WHERE id=?";

  // PREPARE
  $stmt = mysqli_prepare($conn, $sql);

  if($stmt === false) {
    echo mysqli_error($conn);
    } else {
      // BIND
      mysqli_stmt_bind_param($stmt, "i", $id);

      // EXECUTE
      if(mysqli_stmt_execute($stmt)) {

        redirect("/new blog/index.php");

        } else {
          echo mysqli_stmt_error($stmt);
        }
    }
}

?>

<?php require('include/header.php'); ?>
<h2>Delete Article</h2>
<form method="post">
  <p>Are you sure?</p>
  <button type="submit">Delete</button>
  <a href="article.php?id=<?= $article['id'] ?>">Cancel</a
</form>
<?php require('include/footer.php'); ?>
