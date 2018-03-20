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
      <li><a href="report.php">Reservation Report</a></li>
      <li><a href="productsold.php">Product Sold</a></li>
      <li class="active"><a href="graph.php">Graph</a></li>      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="ejay1"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout </a></li>
    </ul>
</nav>

<div class = "form">
<head>
  <title>ChartJS - LineGraph</title>
  <style>
    .chart-container {
      width: auto;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="chart-container">
    <canvas id="mycanvas"></canvas>
  </div>

  <!-- javascript -->
  <script type="text/javascript" src="jquery-3.2.1.min"></script>
  <script type="text/javascript" src="Chart.min.js"></script>
  <script type="text/javascript" src="linegraph.js"></script>
</body>

</div>
</html>
