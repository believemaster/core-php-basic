<?php

require('include/init.php');

$conn = require('include/db.php');

if(isset($_GET['id']))
{
  $article = Article::getById($conn, $_GET['id']);

      if(! $article) {
        die("Article Not Found!");
      }

  } else {
    die("id not supplied, article not found");
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($article->delete($conn)) {
          Url::redirect("/new blog/index.php");
      }
  }

?>

<?php require('include/header.php'); ?>
<h2>Delete Article</h2>
<form method="post">
  <p>Are you sure?</p>
  <button type="submit">Delete</button>
  <a href="article.php?id=<?= $article->id ?>">Cancel</a
</form>
<?php require('include/footer.php'); ?>
