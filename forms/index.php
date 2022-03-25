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
<h4>Basic Form Elements To Be Used:</h4>
<hr>
<form method="post">

    <div>
        text: <input type="text" name="username">
    </div>

    <div>
        password: <input type="password" name="password">
    </div>

    <div>
        tel: <input type="tel" name="mobile">
    </div>

    <div>
        url: <input type="url" name="website">
    </div>

    <div>
        date: <input type="date" name="date">
    </div>

    <div>
        time: <input type="time" name="time">
    </div>

    <div>
        week: <input type="week" name="week">
    </div>

    <div>
        color: <input type="color" name="color">
    </div>

    <div>
        email: <input type="email" name="email">
    </div>

    <div>
        month: <input type="month" name="month">
    </div>

    <div>
        range: <input type="range" name="range">
    </div>

    <div>
        hidden: <input type="hidden" name="hidden">
    </div>

    <div>
        number: <input type="number" name="number">
    </div>

    <div>
        search: <input type="search" name="search">
    </div>

    <div>
        datetime-local: <input type="datetime-local" name="localdate">
    </div>

    <div>
      <select name="select[]" multiple>
        <optgroup label="first four">
          <option value="one" selected>One</option>
          <option value="two">Two</option>
          <option value="three">Three</option>
          <option value="four">Four</option>
        </optgroup>
        <optgroup label="last three">
          <option value="five">Five</option>
          <option value="six">Six</option>
          <option value="seven">Seven</option>
          <option value="eight">Eight</option>
        </optgroup>
      </select>
    </div>

    <div>
      checkbox: <input type="checkbox" name="terms & Cond" value="yes" checked> I agree, T&Cs
      <p>mcqs</p>
      <div>
        <input type="checkbox" name="colors[]" value="red"> Red
        <input type="checkbox" name="colors[]" value="green"> Green
        <input type="checkbox" name="colors[]" value="blue"> Blue
      </div>
    </div>

    <div>
      <input type="radio" name="color" value="red"> Red <br>
      <input type="radio" name="color" value="green"> Green  <br>
      <input type="radio" name="color" value="blue"> Blue
    </div>

    <div>
      textarea: <textarea name="content" rows="8" cols="80"></textarea>
    </div>

    <button type="submit" name="button">Submit</button>

</form>

</body>
</html>
