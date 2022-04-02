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

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_FILES);
  }

?>

<?php require('../include/header.php') ?>

<h2>Edit Article Image</h2>
<form method="post" enctype="multipart/formdata">
  <div>
    <label for="file">Image:</label>
    <input type="file" name="" value="" id="file">
  </div>

  <button>Upload</button>
</form>

<?php require('../include/footer.php') ?>
