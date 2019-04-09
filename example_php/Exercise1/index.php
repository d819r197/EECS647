<?php
  echo "<p>";
  for ($x = 1; $x < 100; $x++)
  {
    for($y = 1; $y <= 100; $y++)
    {
      $product = $x*$y;
      echo $product . " ";
    }
    echo "<br/>";
  }
  echo "</p>";
?>
