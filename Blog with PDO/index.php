<?php

require('classes/Database.php');
require('classes/Article.php');
require('classes/Auth.php');

session_start();

$db = new Database();
$conn = $db->getConn();

$articles = Article::getAll($conn);

?>

<?php include("include/header.php") ?>

<?php if(Auth::isLoggedIn()): ?>
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
