<?php

require('include/database.php');

// SQL query
$sql = "SELECT *
        FROM article
        ORDER BY published_at;";

// Result the sql query
$results = mysqli_query($conn, $sql);

if($results === false) {
  echo mysqli_error($conn);
} else {
  $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);   // Gives associative array of the data
}

?>

<?php include("include/header.php") ?>

<?php if (empty($articles)): ?>
  <p>No Articles Found.</p>
<?php else: ?>
  <ul>
    <?php foreach ($articles as $article): ?>
      <li>
        <article class="">
          <h2><a href="article.php?id=<?= $article['id']; ?>"><?= $article['title']; ?></a> </h2>
          <p><?= $article['content']; ?></p>
        </article>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php include('include/footer.php'); ?>
