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
      <li class="active"><a href="inventory.php">Update Inventory</a></li>
      <li><a href="register.php">Register Product</a></li>
      <li><a href="report.php">Reservation Report</a></li>
      <li><a href="productsold.php">Product Sold</a></li>
      <li><a href="graph.php">Graph</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="ejay1"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout </a></li>
    </ul>
</nav>



<div>
  <div class="form">
    <h3>Update Inventory</h3>
      <table id="Product" class="table table-reponsive" >
    <form method="POST" action="updateq.php" class="top-space">
      <div>
        <div class="form-group">
          <label for="code">*Product code:</label>
          <input class = "box" type="text" class="form-control" id="code" name="code" placeholder="Enter code"
          onkeyup="this.value = this.value.replace(/[^a-z0-9 A-Z]/, '')" />
        </div>
        <div class="form-group">
          <label for="Inventory">*Product Inventory:</label>
          <input class = "box" type="text" id="quantity" name="quantity" placeholder="Enter desired amount"
          onkeyup="this.value = this.value.replace(/[^0-9]/, '')" />
            <input class = "enter" type="submit"  id="quantity" name="submit" value="Update Inventory"/>
        </div>
      </div>
    </form>
    <div class="container top-space">

<thead>
<tr class="gray-bg">
  <th>ID</th>
  <th>NAME</th>
  <th>CODE</th>
  <th>PRICE</th>
  <th>QUANTITY</th>
</tr>
</thead>
<body>
  <?php
  require_once 'init.php';
  $data = $conn->prepare('SELECT * FROM tblproduct');
  $data->execute();
  while ($result = $data->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
    echo "<td>".$result['id']."</td>";
    echo "<td>".$result['productname']."</td>";
    echo "<td>".$result['code']."</td>";
    echo "<td>".$result['price']."</td>";
      echo "<td>".$result['quantity']."</td>";
    echo "</tr>";

  }
    ?>

</body>
</table>
</div>

</body>
</html>