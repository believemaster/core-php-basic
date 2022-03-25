<?php
// CRUD OPERATION IMPLEMENTED

require('include/database.php');
require('include/article.php');

$conn = getDB();

if(isset($_GET['id']))
{
  $article = getArticle($conn, $_GET['id']);
} else {
  $article = null;
}

?>

<?php include('include/header.php'); ?>

      <?php if ($article === NULL): ?>
        <p>Article Not Found.</p>
      <?php else: ?>
        <article>
          <h2><?= htmlspecialchars($article['title']); ?></h2>
          <p><?= htmlspecialchars($article['content']); ?></p>
        </article>

        <a href="editarticle.php?id=<?= $article['id'] ?>">Edit</a>
        <a href="deletearticle.php?id=<?= $article['id'] ?>">Delete</a>
      <?php endif; ?>

<?php include('include/footer.php'); ?>
