<?php
// CRUD OPERATION IMPLEMENTED

require('include/init.php');

$conn = require('include/db.php');

if(isset($_GET['id']))
{
  $article = Article::getWithCategories($conn, $_GET['id']);
} else {
  $article = null;
}
?>

<?php include('include/header.php'); ?>

  <?php if ($article): ?>
    <article>
      <h2><?= htmlspecialchars($article[0]['title']); ?></h2>
      <time datetime=<?= $article[0]['published_at'] ?>>
        <?php
          $dateTime = new DateTime($article[0]['published_at']);
          echo $dateTime->format("j F, Y");
        ?>
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

  <?php else: ?>
    <p>No Article Found</p>
  <?php endif; ?>

<?php include('include/footer.php'); ?>
