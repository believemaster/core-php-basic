<?php

require('include/init.php');

$conn = require('include/db.php');

$paginator = new Paginator(1, 3);
$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

?>

<?php include("include/header.php") ?>

<?php if (empty($articles)): ?>
  <p>No Articles Found.</p>
<?php else: ?>
  <ul>
    <?php foreach ($articles as $article): ?>
      <li>
        <article class="">
          <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a> </h2>
          <p><?= htmlspecialchars($article['content']); ?></p>
        </article>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php include('include/footer.php'); ?>
