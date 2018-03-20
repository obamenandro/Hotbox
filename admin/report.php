<?php
session_start();
if(!isset($_SESSION['username'])){
  die("Refuse connection!");
	header("Location:price.php");
}
?>

<!DOCTYPE html>

<html lang = "en">

<head>
  <meta charset = "UTF-8">
  <title> Dashboard </title>
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <link href = "css/bootstrap.min.css" rel = "stylesheet">
  <link rel  = "stylesheet" href = "main1.css">

  <script src = "jquery-3.2.1.js"> </script>
  <script src = "main1.js"> </script>
</head>

<body>
  <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src = "js/bootstrap.js"></script>

      <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <a class="navbar-brand">Hotbox Vapeshop</a>
          <img class = "pic" src = "logo1.png">
        </div>
        <ul class="nav navbar-nav">
          <li class = "ejay"><a href="price.php">Update Price</a></li>
          <li><a href="inventory.php">Update Inventory</a></li>
          <li><a href="register.php">Register Product</a></li>
          <li class="active"><a href="report.php">Reservation Report</a></li>
          <li><a href="productsold.php">Product Sold</a></li>
          <li><a href="graph.php">Graph</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="ejay1"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout </a></li>
        </ul>
    </nav>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinehotbox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM reservedproduct";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row


  echo '<center>';
  echo '<table border = "5">';
  echo '<tr>';
  echo '<th>id</th>';
  echo '<th>CustomerName</th>';
  echo '<th>ProductName</th>';
  echo '<th>CTNO</th>';
  echo '<th>Code</th>';
  echo '<th>Quantity</th>';
  echo '<th>Reservation Validity</th>';
  echo '<th>Randomizer</th>';
  echo '<th>Sold</th><tr>';



  while($row = $result->fetch_assoc()) {

    echo "<tr><td>" . $row['id'] ."</td>";
    echo "<td>" . $row['customername'] ."</td>";
    echo "<td>" . $row['rproductname'] ."</td>";
    echo "<td>" . $row['ctno'] ."</td>";
    echo "<td>" . $row['code'] ."</td>";
    echo "<td>" . $row['rquantity'] ."</td>";
    echo "<td>" . $row['date_reserved'] ."</td>";
    echo "<td>" . $row['randomizer'] ."</td>";
    //echo "<td><button name=\"sold\" type=\"submit\" value=\"".$row['customername']."\">Sold</button></td></tr>";
    echo "<td>"."<a href=".'confirm-insert.php?random='.$row['randomizer']." class='btn btn-default'>Confirm</a>"."</td>";
    echo "</tr>";

        }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>
