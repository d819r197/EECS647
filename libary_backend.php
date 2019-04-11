<?php
$servername = "mysql.eecs.ku.edu";
$username = "rblake";
$password = "chah9riL";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = $_POST["query"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Row: " . $row . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
