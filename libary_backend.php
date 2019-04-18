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
     addStudent($_POST["sid"], $_POST["dis"], $_POST["name"]);
  }
  else if(isset($_POST['viewS'])) {
     viewStudent();
  }
  else if(isset($_POST['deleteS'])) {
     deleteStudent();
  }
  else if(isset($_POST['addL'])) {
     addLibrarian($_POST["id"], $_POST["name"], $_POST["office"]);
  }
  else if(isset($_POST['viewL'])) {
     viewLibrarian();
  }
  else if(isset($_POST['deleteL'])) {
     deleteLibrarian();
  }
  else if(isset($_POST['addB'])) {
     addBook($_POST["id"], $_POST["pc"], $_POST["title"], $_POST["genre"]);
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

function addLibrarian($id, $name, $office) {
  $conn = establishConnection();
  $sql = "INSERT INTO `LIBRARIAN` (ID, LIBRARIAN_NAME, OFFICE) VALUES (\"" . $id . "\", \"" . $name . "\", \"" . $office . "\")";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

function listLibrarian() {
$conn = establishConnection();

}

function removeLibrarian() {
$conn = establishConnection();

}

function addBook($id, $pg, $title, $genre) {
  $conn = establishConnection();
  $sql = "INSERT INTO `BOOKS` (BOOK_ID, PAGECOUNT, TITLE, GENRE) VALUES (\"" . $id . "\", \"" . $pg . "\", \"" . $title . "\", \"" . $genre . "\")";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
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

//Locate Function to Call
triggerAction();

//Add Back Button
echo "<br><hr><a href='index.html'>Back</a>";

//Close Connection with Database
$conn->close();

?>

                                                                                                                                                                                          86,0-1        Bot
