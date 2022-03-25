<?php

  // Without Argument
  function showMessage() {
    echo "This is message </br>";
  }

  showMessage();

  // With argument
  function showMessage2($name)
  {
    echo "Hey! this argument function $name </br>";
  }

  showMessage2("User");

  /**
  *
  * Get the message
  *
  * @param boolean $morning true if morning, false otherwise
  *
  * @return string a message relevant to if it's morning or not
  */
  function getMessage3($morning)
  {
    if($morning) {
      return "Good Morning";
    } else {
      return "Good Afternoon";
    }
  }

  $message = getMessage3(false);
  echo $message

?>
