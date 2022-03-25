<?php

require('include/database.php');

if(isset($_GET['id']) && is_numeric($_GET['id']))
{
  // SQL query
  $sql = "SELECT *
          FROM article
          WHERE id =". $_GET['id'];

  // Result the sql query
  $results = mysqli_query($conn, $sql);

  if($results === false) {
    echo mysqli_error($conn);
  } else {
    $article = mysqli_fetch_assoc($results);
  }
} else {
  $article = null;
}

?>

<?php include('include/header.php'); ?>

      <?php if ($article === NULL): ?>
        <p>Article Not Found.</p>
      <?php else: ?>
        <article>
          <h2><?= $article['title']; ?></h2>
          <p><?= $article['content']; ?></p>
        </article>
      <?php endif; ?>

<?php include('include/footer.php'); ?>
