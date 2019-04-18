<?php

function establishConnection() {
  // Create connection
  $conn = new mysqli("mysql.eecs.ku.edu", "rblake", "chah9riL", "rblake");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  else {
    echo "Connected successfully <br>";
  }
  return($conn);
}

function triggerAction() {
  if(isset($_POST['addS'])) {
     addStudent();
  }
  else if(isset($_POST['viewS'])) {
     viewStudent();
  }
  else if(isset($_POST['deleteS'])) {
     deleteStudent();
  }
  else if(isset($_POST['addL'])) {
     addLibrarian();
  }
  else if(isset($_POST['viewL'])) {
     viewLibrarian();
  }
  else if(isset($_POST['deleteL'])) {
     deleteLibrarian();
  }
  else if(isset($_POST['addB'])) {
     addBook();
  }
  else if(isset($_POST['viewB'])) {
     viewBook();
  }
  else if(isset($_POST['deleteB'])) {
     deleteBook();
  }
  else if(isset($_POST['testSQL'])) {
     testSQL();
  }
}

function addStudent($sid, $dis, $name) {
  $conn = establishConnection();
  $sid = $_POST["sid"];
  $dis = $_POST["dis"];
  $name = $_POST["name"];
  $sql = "INSERT INTO `STUDENT` (SID, DATE_IN_SCHOOL, NAME) VALUES (\"" . $sid . "\", \"" . $dis . "\", \"" . $name . "\")";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

function listStudent() {
$conn = establishConnection();

}

function removeStudent() {
$conn = establishConnection();

}

function addLibrarian() {
$conn = establishConnection();

}

function listLibrarian() {
$conn = establishConnection();

}

function removeLibrarian() {
$conn = establishConnection();

}

function addBook() {
$conn = establishConnection();

}

function listBook() {
$conn = establishConnection();

}

function removeBook() {
$conn = establishConnection();

}

/*
function checkoutBook() {
$conn = establishConnection();

}

function listCheckedoutBook () {
$conn = establishConnection();

}

function checkinBook() {
$conn = establishConnection();

}
*/

function testSQL() {
  $conn = establishConnection();
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
}

triggerAction();

//Add Back Button
echo "<br><hr><a href='index.html'>Back</a>";

//Close Connection with Database
$conn->close();

?>

                                                                                                                                                                                          86,0-1        Bot
