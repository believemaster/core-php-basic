<?php

require('include/init.php');

$conn = require('include/db.php');

// if(isset($_GET['page'])) {
//   $paginator = new Paginator($_GET['page'], 3);
// } else {
//   $paginator = new Paginator(1, 3);
// }
// $paginator = new Paginator(isset($_GET['page']) ? $_GET['page'] : 1, 3);  // For Pagination Pages this code is simpler version of above code with ternary operator

$paginator = new Paginator($_GET['page'] ?? 1, 3, Article::getTotal($conn)); // In php 7 with null coalasing operator.
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
  <nav>
    <ul>
      <li>
        <?php if($paginator->previous) : ?>
          <a href="?page=<?= $paginator->previous; ?>">Previous</a>
        <?php else: ?>
          Previous
        <?php endif; ?>
      </li>
      <li>
        <?php if($paginator->next) : ?>
          <a href="?page=<?= $paginator->next; ?>">Next</a>
        <?php else: ?>
          Next
        <?php endif; ?>
      </li>
    </ul>
  </nav>
<?php endif; ?>

<?php include('include/footer.php'); ?>
