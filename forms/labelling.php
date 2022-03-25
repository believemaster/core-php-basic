<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    var_dump($_POST);

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Forms</title>
    <meta charset="utf-8">
</head>
<body>

<hr>
<h4>Using labe0 & field set in form: </h4>
<hr>
<form method="post">
    <fieldset>
      <legend>Article</legend>
      <div>
        <label for="title">Title:</label><input id="title" type="text" name="title" value="">
      </div>
      <div>
        <label for="conent">Content:</label> <textarea id="conent" name="content" rows="8" cols="80" placeholder="Enter Content"></textarea>
      </div>
    </fieldset>

      <!-- This way lable is quick to work but just valid technique for check box and radio -->
    <fieldset>
      <legend>Attributes</legend>
        <div>
          <label>
            <input type="checkbox" name="visible" value="yes"> Visible
          </label>
        </div>
    </fieldset>

    <fieldset>
      <legend>Color</legend>
      <div>
        <p>Colour: </p>
        <input type="radio" name="color" value="red" id="color_red">
        <label for="color_red">RED?</label> <br>

        <input type="radio" name="color" value="green" id="color_green">
        <label for="color_green">Green?</label>

      </div>
    </fieldset>

    <button type="submit" name="button">Submit</button>

</form>

</body>
</html>
