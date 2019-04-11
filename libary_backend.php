<?php
$servername = "mysql.eecs.ku.edu";
$username = "rblake";
$password = "chah9riL";

// Create connection
#$conn = new mysqli($servername, $username, $password);
#$conn = new mysqli("mysql.eecs.ku.edu", "d819r197", "Koo3Kee4", "d819r197");
$conn = new mysqli("mysql.eecs.ku.edu", "rblake", "chah9riL", "rblake");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//$sql = $_POST["query"];
//$sql = "SELECT CRUISENUM, DIRECTOR FROM CRUISE;";
$sql = "SELECT * FROM `CRUISE`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      printf ("%s (%s)\n", $row["CRUISENUM"], $row["DIRECTOR"]);
  }
} else {
    echo "0 results";
}
/*
$userInput = "123b2lake123";

$userQuery = "SELECT * FROM `Users` WHERE `user_id`='" . $userInput . "';";
  $userIs = $conn->query($userQuery);
  $numUsersFound = $userIs->num_rows;
  
  if ($numUsersFound > 0) {
    echo "<p>Error: User already exist.</p><br>";
  }
  else {
    echo "<p>Number of Users with Username: " . $userInput . " is: " . $numUsersFound . "</p>";
  }*/
$conn->close();

?>

