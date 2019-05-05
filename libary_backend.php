<?php

function establishConnection() {
  // Create connection
  $conn = new mysqli("mysql.eecs.ku.edu", "cjunpeng", "auCh7eiz", "cjunpeng");

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
  else if(isset($_POST['qu1'])) {
    Squery1();
  }
  else if(isset($_POST['qu2'])) {
    Squery2();
  }
  else if(isset($_POST['qu3'])) {
    Squery3();
  }
  else if(isset($_POST['qu4'])) {
    Lquery1();
  }
  else if(isset($_POST['qu5'])) {
    Lquery2();
  }
  else if(isset($_POST['qu6'])) {
    Bquery1();
  }
  else if(isset($_POST['qu7'])) {
    Bquery2();
  }
  else if(isset($_POST['qu8'])) {
    Bquery3();
  }
  else if(isset($_POST['qu9'])) {
    Liquery();
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

//Query1(List the Student who borrowed the book from Book Mark Library)
function Squery1(){
  $conn =establishConnection();
  $sql ="SELECT `NAME` FROM `STUDENT`,`RENT_BOOK_FROM` WHERE `STUDENT`.`SID`=`RENT_BOOK_FROM`.`SID` AND `LIBRARY_NAME`= 'Book Mark Library'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Student ID: " . $row["NAME"] . "<br>";
    }
  }else {
    echo "0 results";
  }
}

//Query2(List the Student who borrowed the book with hightest pages)
function Squery2(){
  $conn =establishConnection();
  $sql ="SELECT `NAME` FROM `STUDENT`,`RENT_BOOK_FROM`,`BOOKS` WHERE `STUDENT`.`SID`=`RENT_BOOK_FROM`.`SID` AND `RENT_BOOK_FROM`.`BOOK_ID`=`BOOKS`.`BOOK_ID` AND `PAGECOUNT`>=ALL (SELECT `PAGECOUNT` FROM `BOOKS`)";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Student ID: " . $row["NAME"] . "<br>";
      //  echo "Pagecount: " . $row["PAGECOUNT"] . "<br>";
    }
  }else {
    echo "0 results";
  }
}

// Query3(List the Student who passed the due date)
function Squery3(){
  $conn =establishConnection();
  $sql ="SELECT DISTINCT `NAME`,`CHECKOUTDATE`,`DUEDATE` FROM `STUDENT`,`RENT_BOOK_FROM` WHERE `STUDENT`.`SID`=`RENT_BOOK_FROM`.`SID` AND `DUEDATE`< `CHECKOUTDATE` GROUP BY NAME";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Student ID: " . $row["NAME"] . "<br>";
       echo "Checkout date: " . $row["CHECKOUTDATE"] . "<br>";
       echo "Due date: " . $row["DUEDATE"] . "<br>";
    }
  }else {
    echo "0 results";
  }
}

//Query1(List the name of library which has the most books)
function Lquery1(){
  $conn =establishConnection();
  $sql ="SELECT `LIBRARY_NAME` FROM `LIBRARY` WHERE `NUMOFBOOKS`>=ALL(SELECT `NUMOFBOOKS` FROM `LIBRARY`)";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Library name: " . $row["LIBRARY_NAME"] . "<br>";
    }
  }else {
    echo "0 results";
  }
}

// Query2(List the name of library which has a librarian works in office 012)
function Lquery2(){
  $conn =establishConnection();
  $sql ="SELECT `LIBRARY_NAME`
  FROM `LIBRARY` , `LIBRARIAN`
  WHERE `LIBRARY`.`LIBRARIAN_NAME` = `LIBRARIAN`.`LIBRARIAN_NAME`
  AND `OFFICE` = '012'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Library name: " . $row["LIBRARY_NAME"] . "<br>";
    }
  }else {
    echo "0 results";
  }
}

//Query1(List the title of book which has been checked out before 2014-05)
function Bquery1(){
  $conn =establishConnection();
  $sql ="SELECT DISTINCT `TITLE`
  FROM `BOOKS`, `RENT_BOOK_FROM`
  WHERE `BOOKS`.`BOOK_ID` = `RENT_BOOK_FROM`.`BOOK_ID`
  AND `CHECKOUTDATE` < '2014-05-00 00:00:00'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Title name: " . $row["TITLE"] . "<br>";
    }
  }else {
    echo "0 results";
  }
}

//Query2(List the title of book is borrowed by Frank )
function Bquery2(){
  $conn =establishConnection();
  $sql ="SELECT `TITLE`
  FROM `BOOKS`, `RENT_BOOK_FROM`, `STUDENT`
  WHERE `BOOKS`.`BOOK_ID` = `RENT_BOOK_FROM`.`BOOK_ID`
  AND `RENT_BOOK_FROM`.`SID` = `STUDENT`.`SID`
  AND `STUDENT`.`NAME` = 'Frank'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Library name: " . $row["TITLE"] . "<br>";
    }
  }else {
    echo "0 results";
  }
}

//Query3(List the title of book with Medical genre)
function Bquery3(){
  $conn =establishConnection();
  $sql ="SELECT `TITLE`
  FROM `BOOKS`
  WHERE `GENRE` = 'Medical'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Library name: " . $row["TITLE"] . "<br>";
    }
  }else {
    echo "0 results";
  }
}

function Liquery(){
  $conn =establishConnection();
  $sql ="SELECT LIBRARIAN_NAME
  FROM LIBRARIAN
  WHERE OFFICE = '099'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result ->fetch_assoc()){
       echo "Title name: " . $row["LIBRARIAN_NAME"] . "<br>";
    }
  }else {
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
