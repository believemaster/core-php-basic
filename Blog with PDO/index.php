<?php

require('include/init.php');

$conn = require('include/db.php');

// if(isset($_GET['page'])) {
//   $paginator = new Paginator($_GET['page'], 3);
// } else {
//   $paginator = new Paginator(1, 3);
// }
// $paginator = new Paginator(isset($_GET['page']) ? $_GET['page'] : 1, 3);  // For Pagination Pages this code is simpler version of above code with ternary operator

$paginator = new Paginator($_GET['page'] ?? 1, 3, Article::getTotal($conn), true); // In php 7 with null coalasing operator.
$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);

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
          <time datetime=<?= $article[0]['published_at'] ?>>
            <?php
              $dateTime = new DateTime($article['published_at']);
              echo $dateTime->format("j F, Y");
            ?>
          </time>
          <?php if ($article['category_names']): ?>
            <p>Categories:
              <?php foreach ($article['category_names'] as $name): ?>
                <?= htmlspecialchars($name); ?>
              <?php endforeach; ?>
            </p>
          <?php endif; ?>
          <p><?= htmlspecialchars($article['content']); ?></p>
        </article>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php require('include/pagination.php'); ?>

<?php endif; ?>

<?php include('include/footer.php'); ?>
