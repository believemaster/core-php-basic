<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/PHPMailer/src/Exception.php';
  require 'vendor/PHPMailer/src/PHPMailer.php';
  require 'vendor/PHPMailer/src/SMTP.php';
  require 'include/init.php';

  $email = '';
  $subject = '';
  $message = '';
  $sent = false;

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = [];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $errors[] = "Please enter a valid email address.";
    }

    if($subject == '') {
      $errors[] = "Please enter a subject";
    }

    if($message == '') {
      $errors[] = "Please enter a message";
    }

    if(empty($errors)) {
      $email = new PHPMailer(true);

      try {
        $email->isSMTP();
        $email->host        = SMTP_HOST;
        $email->SMTPAuth    = true;
        $email->Username    = SMTP_USER;
        $email->Password    = SMTP_PASS;
        $email->SMTPSecure  = 'tls';
        $email->Port        = 587;


        $email->setFrom('webemail');
        $email->addAddress('via');
        $email->addReplyTo($email);
        $email->subject = $subject;
        $email->body = $message;

        $email->send();

        $sent = true;
      } catch (Exception $e) {
        $errors[] = $email->ErrorInfo;
      }

    }
  }

?>

<?php require 'include/header.php'; ?>

<h2>Contact</h2>

<?php if ($sent): ?>
  <p class="alert alert-success">Message Sent</p>
<?php else: ?>

  <?php if (! empty($errors)): ?>
    <ul>
      <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <form id="formContact" method="post">
    <div class="form-group">
      <label for="email">Your Email</label>
      <input  class="form-control" id="email" type="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="Your Email">
    </div>

    <div class="form-group" class="form-group">
      <label for="subject">Subject</label>
      <input  class="form-control" id="subject" name="subject" placeholder="Subject" value="<?= htmlspecialchars($subject) ?>">
    </div>

    <div class="form-group">
      <label for="message"></label>
      <textarea  class="form-control" id="message" placeholder="Message" name="message" rows="8" cols="80"><?= htmlspecialchars($message) ?></textarea>
    </div>

    <button class="btn btn-outline-dark" type="submit" name="button">Send</button>
  </form>

<?php endif; ?>

  <?php require 'include/footer.php'; ?>
