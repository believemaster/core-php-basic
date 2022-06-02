<?php if(! empty($article->errors)): ?>
  <ul>
    <?php foreach ($article->errors as $error): ?>
        <li><?= $error ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<form action="" method="post">
  <div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($article->title); ?>">
  </div>
  <div>
    <label for="content">Content</label>
    <textarea name="content" rows="8" cols="40" id="content" placeholder="Articel content"><?= htmlspecialchars($article->content); ?></textarea>
  </div>
  <div>
    <label for="published_at">Published Date & Time</label>
    <input type="datetime-local" name="published_at" id="published_at" value="<?= htmlspecialchars($article->published_at); ?>">
  </div>
  <fieldset>
    <legend>Categories</legend>
    <?php foreach ($categories as $category): ?>
      <div>
        <input id="category<?= $category['id'] ?>" type="checkbox" name="category[]" value="<?= $category['id'] ?>"
        <?php if(in_array($category['id'], $category_ids)): ?>checked<?php endif; ?>>
        <label for="category<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></label>
      </div>
    <?php endforeach; ?>
  </fieldset>
  <button type="submit">SAVE</button>
</form>
