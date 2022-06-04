<?php require 'include/init.php'; ?>
<?php require 'include/header.php'; ?>

<h2>Contact</h2>

<form class="" action="" method="post">
  <div class="form-group">
    <label for="email">Your Email</label>
    <input  class="form-control" id="email" type="email" name="email" placeholder="Your Email">
  </div>

  <div class="form-group" class="form-group">
    <label for="subject">Subject</label>
    <input  class="form-control" id="subject" name="subject" placeholder="Subject">
  </div>

  <div class="form-group">
    <label for="message"></label>
    <textarea  class="form-control" id="message" name="message" rows="8" cols="80"></textarea>
  </div>

  <button class="btn btn-outline-dark" type="button" name="button">Send</button>
</form>

<?php require 'include/footer.php'; ?>
