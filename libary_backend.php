<?php

function establishConnection() {
  // Create connection
  $conn = new mysqli("mysql.eecs.ku.edu", "rblake", "chah9riL", "rblake");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  else {
    echo "Connected successfully <br><hr>";
  }
  return($conn);
}

function triggerAction() {
  if(isset($_POST['addS'])) {
    addStudent($_POST["sid"], $_POST["dis"], $_POST["name"]);
  }
  else if(isset($_POST['viewS'])) {
    listStudent();
  }
  else if(isset($_POST['deleteS'])) {
     removeStudent($_POST["name"]);
  }
  else if(isset($_POST['addL'])) {
     addLibrarian($_POST["lid"], $_POST["name"], $_POST["office"]);
  }
  else if(isset($_POST['viewL'])) {
     listLibrarian();
  }
  else if(isset($_POST['deleteL'])) {
     removeLibrarian($_POST["lid"]);
  }
  else if(isset($_POST['addB'])) {
     addBook($_POST["id"], $_POST["pc"], $_POST["title"], $_POST["genre"]);
  }
  else if(isset($_POST['viewB'])) {
     listBook();
  }
  else if(isset($_POST['deleteB'])) {
     removeBook($_POST["id"]);
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
  $sql = "SELECT * FROM `STUDENT`";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "SID: " . $row["SID"] . "<br>";
        echo "Date In School: " . $row["DATE_IN_SCHOOL"] . "<br>";
        echo "Student Name: " . $row["NAME"] . "<br><hr>";
    }
  } else {
      echo "0 results";
  }
}

function removeStudent($id) {
  $conn = establishConnection();
  $sql = "DELETE FROM `STUDENT` WHERE `NAME`=\"" . $id . "\"";
  
  if($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  } 
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
  $sql = "SELECT * FROM `LIBRARIAN`";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ID"] . "<br>";
        echo "Lirarian Name: " . $row["LIBRARIAN_NAME"] . "<br>";
        echo "Office: " . $row["OFFICE"] . "<br><hr>";
    }
  } else {
      echo "0 results";
  }
}

function removeLibrarian($id) {
  $conn = establishConnection();
  $sql = "DELETE FROM `LIBRARIAN` WHERE `ID`=\"" . $id . "\"";

  if(mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
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
  $sql = "SELECT * FROM `BOOKS`";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "Book ID: " . $row["BOOK_ID"] . "<br>";
        echo "Page Count: " . $row["PAGECOUNT"] . "<br>";
        echo "Title: " . $row["TITLE"] . "<br>";
        echo "Genre: " . $row["GENRE"] . "<br><hr>";
    }
  } else {
      echo "0 results";
  }
}

function removeBook($id) {
  $conn = establishConnection();
  $sql = "DELETE FROM `BOOKS` WHERE `BOOK_ID`=\"" . $id . "\"";

	if(mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
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
