<?php

require('../include/init.php');

Auth::requireLogin();

$conn = require('../include/db.php');

if(isset($_GET['id']))
{
  $article = Article::getById($conn, $_GET['id']);

  if(! $article) {
    die("Article Not Found!");
  }
} else {
  die("id not supplied, article not found");
}

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
      if(empty($_FILES)) {
        throw new Exception('Invalid upload');
      }

      switch($_FILES['file']['error']) {
        case UPLOAD_ERR_OK:
          break;

        case UPLOAD_ERR_NO_FILE:
          throw new Exception('No file uploaded');
          break;

        case UPLOAD_ERR_INI_SIZE:
          throw new Exception('File is too large (from server settings)');
          break;

        default:
          throw new Exception('An Error Occured');
      }

      // restrict the file size
      if($_FILES['file']['size'] > 1000000) {
        throw new Exception('File is too large');
      }

      // restrict the file type
      $mime_types = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $mime_type = finfo_file($finfo, $_FILES['file']['tmp_name']);

      if (! in_array($mime_type, $mime_types)) {
        throw new Exception('Invalid file type');
      }

      // move the uploaded file
      $pathinfo = pathinfo($_FILES['file']['name']);
      $base = $pathinfo['filename'];

      // replace any characters that aren't letters, numbers, underscores or hyphens with an undescore
      $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);
      // restrict the name of uploaded file to 200 characters
      $base = mb_substr($base, 0, 200);

      $filename = $base . "." . $pathinfo['extension'];
      $destination = "../uploads/$filename";

      $i=1;
      while(file_exists($destination)) {
        $filename = $base . "-$i." . $pathinfo['extension'];
        $destination = "../uploads/$filename";

        // add a numeric suffix to the filename to avoid overwrting existing files
        $i++;
      }

      if(move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {

        $previous_image = $article->image_file;

        if($article->setImageFile($conn, $filename)) {

          if ($previous_image) {
            unlink("../uploads/$previous_image");
          }

          Url::redirect("/Blog with PDO/admin/editarticleimage.php?id={$article->id}");
        }
      } else {
        throw new Exception('Unable to move uploaded file');
      }

    } catch (Exception $e) {
      $error = $e->getMessage();
    }

  }

?>

<?php require('../include/header.php') ?>

<h2>Edit Article Image</h2>

<?php if ($article->image_file): ?>
  <img src="/Blog with PDO/uploads/<?= $article->image_file; ?>">
  <a href="deletearticleimage.php?id=<?= $article->id ?>">Delete</a>
<?php endif; ?>

<?php if (isset($error)) : ?>
  <p><?= $error ?></p>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
  <div>
    <label for="file">Image:</label>
    <input type="file" name="file" id="file">
  </div>

  <button>Upload</button>
</form>

<?php require('../include/footer.php') ?>
