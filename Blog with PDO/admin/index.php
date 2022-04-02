<?php

require('../include/init.php');
Auth::requireLogin();

$conn = require('../include/db.php');

$articles = Article::getPage($conn, 3, 0);

?>

<?php include("../include/header.php") ?>

<h3>Admin</h3>
<p><a href="newarticle.php">New Article</a></p>

<?php if (empty($articles)): ?>
  <p>No Articles Found.</p>
<?php else: ?>
  <table>
    <thead>
      <th>Title</th>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
      <tr>
        <td class="">
          <a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

<?php include('../include/footer.php'); ?>
