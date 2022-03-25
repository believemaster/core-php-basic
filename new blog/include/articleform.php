<?php if(! empty($errors)): ?>
  <ul>
    <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<form action="" method="post">
  <div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($title); ?>">
  </div>
  <div>
    <label for="content">Content</label>
    <textarea name="content" rows="8" cols="40" id="content" placeholder="Articel content"><?= htmlspecialchars($content); ?></textarea>
  </div>
  <div>
    <label for="published_at">Published Date & Time</label>
    <input type="datetime-local" name="published_at" id="published_at" value="<?= htmlspecialchars($published_at); ?>">
  </div>
  <button type="submit">SAVE</button>
</form>
