<?php
// CRUD OPERATION IMPLEMENTED

require('include/init.php');

$conn = require('include/db.php');

if(isset($_GET['id']))
{
  $article = Article::getById($conn, $_GET['id']);
} else {
  $article = null;
}

?>

<?php include('include/header.php'); ?>

  <?php if ($article): ?>
    <article>
      <h2><?= htmlspecialchars($article->title); ?></h2>
      <p><?= htmlspecialchars($article->content); ?></p>
    </article>
    
  <?php else: ?>
    <p>No Article Found</p>
  <?php endif; ?>

<?php include('include/footer.php'); ?>
