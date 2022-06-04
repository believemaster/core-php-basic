<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ajax Example</title>
  </head>
  <body>
    <h1>Ajax Example</h1>
    <!-- <p>The time when server executed the page is <time><?= date('g:i:s') ?></time></p> -->
    <p>The time when server executed the page is <time id="currentTime"><?= date('g:i:s') ?></time></p>

    <button id="btn" type="button">Refresh</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $("#btn").on("click", function(){
        $.ajax("gettime.php")
          .done(function(data){
            // alert("The time without reloading the page and using ajax is: " + data);
            $("#currentTime").html(data);
          })
      });
    </script>
  </body>
</html>
