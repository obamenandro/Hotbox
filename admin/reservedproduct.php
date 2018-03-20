<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinehotbox1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, customername, ctno, code, rquantity, date_reserved FROM reservedproduct";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row



    echo '<table border = "5">';
    echo '<tr>';
    echo '<th>id</th>';
    echo '<th>CustomerName</th>';
    echo '<th>CTNO</th>';
    echo '<th>Code</th>';
    echo '<th>Quantity</th>';
    echo '<th>ReserveDate</th><tr>';



    while($row = $result->fetch_assoc()) {

      echo "<tr><td>" . $row['id'] ."</td>";
      echo "<td>" . $row['customername'] ."</td>";
      echo "<td>" . $row['ctno'] ."</td>";
  		echo "<td>" . $row['code'] ."</td>";
      echo "  <td>" . $row['rquantity'] ."</td>";
  		echo "<td>" . $row['date_reserved'] ."</td></tr>";


          }
} else {
    echo "0 results";
}
$conn->close();
?>
