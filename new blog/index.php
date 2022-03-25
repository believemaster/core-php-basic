<?php

require('include/database.php');
require('include/auth.php');

session_start();

$conn = getDB();

// SQL query
$sql = "SELECT *
        FROM article
        ORDER BY published_at DESC;";

// Result the sql query
$results = mysqli_query($conn, $sql);

if($results === false) {
  echo mysqli_error($conn);
} else {
  $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);   // Gives associative array of the data
}

?>

<?php include("include/header.php") ?>

<?php if(isLoggedIn()): ?>
  <p>You are logged in. <a href="logout.php">Logout</a> </p>
  <p><a href="newarticle.php">New Article</a></p>
<?php else: ?>
  <p>You are not logged in. <a href="login.php">Login</a> </p>
<?php endif; ?>

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
