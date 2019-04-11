<?php
$servername = "mysql.eecs.ku.edu";
$username = "rblake";
$password = "chah9riL";
$dbname = "rblake";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

$sql = $_POST["query"];
echo $sql;
#$result = $conn->query($sql);

$result = mysql_query($sql);

if (!$result) {
    echo '<br>Could not run query: ' . mysql_error() . "<br>";
    #exit;
}

$row = mysql_fetch_row($result);

echo "cell 1: " . $row[0]; // 42
echo "cell 2: " . $row[1]; // the email value

/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Row: " . $row . "<br>";
    }
} else {
    echo "0 results";
}*/
$conn->close();

?>
