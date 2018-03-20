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
        <li class="active"><a href="register.php">Register Product</a></li>
        <li><a href="report.php">Reservation Report</a></li>
        <li><a href="productsold.php">Product Sold</a></li>
        <li><a href="graph.php">Graph</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="ejay1"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout </a></li>
      </ul>
  </nav>


      <div>

        <div>
          <div class="form">
            <h3>Register Product</h3>
            <form method="POST" action="additem.php" class="top-space">
              <div>
                <div class="form-group">
                  <label for="productname">*Product Name:</label>
                  <input class = "box" type="text" class="form-control" id="productname" name="productname" placeholder="Enter Product name"
                  onkeyup="this.value = this.value.replace(/[^a-z0-9 A-Z]/, '')" />
                </div>
                <div class="form-group">
              <label for="name">*Product Type:</label>
                    <select class = "mod" name="type" id="type" size="1">
                      <option value="Mod">Mod</option>
                      <option value="Atomizer">Atomizer</option>
                      <option value="Battery">Battery</option>
                      <option value="Juice">Juice</option>
                      <option value="Charger">Charger</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="price">*Product price:</label>
                  <input class = "box" type="text" class="form-control" id="price" name="price" placeholder="Enter price"
                  onkeyup="this.value = this.value.replace(/[^0-9]/, '')" />
                </div>
        		 <div class="form-group">
                  <label for="price">*Quantity:</label>
                  <input class = "box" type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter desired amount"
                  onkeyup="this.value = this.value.replace(/[^0-9]/, '')"/>
                </div>
              </div>

              <div>
                <div class="form-group">
                  <label for="image">*Product image:</label>
                    <form action="additem.php" method="post" enctype="multipart/form-data">
                      select image to upload:
                      <input type="file" name="image" accept="image/*"/>
                      <input class = "enter" type="submit"  id="image" name="submit" value="Register product"/>
                    </form>
                </div>
              </div>

            </form>
          </div>          </div>
        </div>


</body>
</html>
