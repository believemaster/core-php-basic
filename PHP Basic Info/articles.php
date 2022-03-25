<!-- thsis just simple blog with local storage -->

<?php

  $articles = [
    [
      "title" => "title of first article",
      "body" => "this is first article content"
    ],
    [
      "title" => "title of second article",
      "body" => "this is second article content"
    ],
    [
      "title" => "title of third article",
      "body" => "this is third article content"
    ]
  ]

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Blog</title>
  </head>
  <body>
    <header>My Blog</header>

    <main>
      <ul>
        <?php foreach ($articles as $article): ?>
          <li>
            <article class="">
              <h2><?= $article['title']; ?></h2>
              <p><?= $article['body']; ?></p>
            </article>
          </li>
        <?php endforeach; ?>
      </ul>
    </main>
  </body>
</html>
