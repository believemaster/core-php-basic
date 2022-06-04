<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Get Data From Ajax</title>
  </head>
  <body>
    <h1>Ajax Example</h1>
    <h4>JSON data example</h4>
    <!-- JSON Data example using ajax request -->
    <dl>
      <dt>Name</dt>
      <dd id="name"></dd>

      <dt>Email</dt>
      <dd id="email"></dd>

      <dt>Date of Birth</dt>
      <dd id="dob"></dd>
    </dl>

    <button id="btn" type="button">Get Data</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $("#btn").on("click", function(){
        $.ajax("getdata.php")
          .done(function(data){
            var json = JSON.parse(data)

            // alert(json.name);
            $('#name').html(json.name);
            $('#email').html(json.email);
            $('#dob').html(json.dob);
          });
      });
    </script>
  </body>
</html>
