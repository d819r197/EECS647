<?php
// Create connection
$conn = new mysqli("mysql.eecs.ku.edu", "rblake", "chah9riL", "rblake");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
  echo "Connected successfully <br>";
}

//Creates an Array of Tables
/*function create_tables()
{

    echo "Table Extraction Started... <br>";

    $conn = new mysqli("mysql.eecs.ku.edu", "rblake", "chah9riL", "rblake");

    $database='rblake';
    $tables = array();
    //$list_tables_sql = "SHOW TABLES FROM {$database};";
    $list_tables_sql = "SHOW TABLES;";
    $result = $conn->query($list_tables_sql);

    if ($result) {
      if ($result->num_rows > 0) {
        echo "num rows > 0 success <br>";

        while($row = $result->fetch_assoc())) { // go through each row that was returned in $result
          echo($table[0] . "<BR>");    // print the table that was returned on that row.
          $tables[] = $table[0];
        }
      }
    }
    else if ($result->num_rows > 0) {
      while($table = mysql_fetch_row($result))
      {
        $tables[] = $table[0];
        echo $table[0];
      }
    return $tables;
    echo "Table Made!<br>";
    }
    else {
      echo "Table Extraction Failed <br>";
  }
}

//Make Table of Tables
//$arr_tables = array();
//$arr_tables = create_tables();

//Create Front End Select Input for Each Table
echo "<select><option>Select a Table</option>";
for($lcv = 0; $lcv < sizeof($arr_tables); $lcv++) {
  echo "<option value='" . $arr_tables[$lcv] . "'>" . $arr_tables[$lcv] . "</option><br>";
}
echo "</select>";
*/


//$sql = $_POST["query"];
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


//Close Connection with Database
$conn->close();

?>

                                                                                                                                                                                          86,0-1        Bot

