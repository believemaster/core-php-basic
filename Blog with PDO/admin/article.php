<?php
// CRUD OPERATION IMPLEMENTED

require('../include/init.php');

Auth::requireLogin();

$conn = require('../include/db.php');

if(isset($_GET['id']))
{
  $article = Article::getWithCategories($conn, $_GET['id'], true);
} else {
  $article = null;
}

?>

<?php include('../include/header.php'); ?>

  <?php if ($article): ?>
    <article>
      <h2><?= htmlspecialchars($article[0]['title']); ?></h2>
      <time datetime="<?= $article[0]['published_at'] ?>">
        <?php if ($article[0]['published_at']): ?>
          <?php
            $dateTime = new DateTime($article[0]['published_at']);
            echo $dateTime->format("j F, Y");
          ?>
        <?php else: ?>
          Unpublished
        <?php endif; ?>
      </time>

      <?php if ($article[0]['category_name']): ?>
        <p>Categories:
          <?php foreach ($article as $a): ?>
            <?= htmlspecialchars($a['category_name']); ?>
          <?php endforeach; ?>
        </p>
      <?php endif; ?>

      <?php if ($article[0]['image_file']): ?>
        <img src="/Blog with PDO/uploads/<?= $article[0]['image_file']; ?>">
      <?php endif; ?>

      <p><?= htmlspecialchars($article[0]['content']); ?></p>
    </article>

    <a href="editarticle.php?id=<?= $article[0]['id']; ?>">Edit</a>
    <a class="delete" href="deletearticle.php?id=<?= $article[0]['id']; ?>">Delete</a>
    <a href="editarticleimage.php?id=<?= $article[0]['id']; ?>">Edit Image</a>
  <?php else: ?>
    <p>No Article Found</p>
  <?php endif; ?>

<?php include('../include/footer.php'); ?>
