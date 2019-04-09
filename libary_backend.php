<?php
  $user = $_POST["user"];
  $pass = $_POST["pass"];
  $total = 0;

  if($_POST["1a"])
  {
    $total += $_POST["1a"].value;
  }
  if($_POST["1b"])
  {
    $total += $_POST["1b"].value;
  }
  if($_POST["1c"])
  {
    $total += $_POST["1c"].value;
  }
  if($_POST["2a"])
  {
    $total += $_POST["2a"].value;
  }
  if($_POST["2b"])
  {
    $total += $_POST["2b"].value;
  }
  if($_POST["2c"])
  {
    $total += $_POST["2c"].value;
  }
  echo "<p>The Total is: " + $total + ".</p>";
?>
