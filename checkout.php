<?php
session_start();
require_once("dbcontroller.php");
require_once("init.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
 case "add":
   if(!empty($_POST["quantity"])) {
     $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
     $itemArray = array($productByCode[0]["code"]=>array('productname'=>$productByCode[0]["productname"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

     if(!empty($_SESSION["cart_item"])) {
       if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
         foreach($_SESSION["cart_item"] as $k => $v) {
             if($productByCode[0]["code"] == $k) {
               if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                 $_SESSION["cart_item"][$k]["quantity"] = 0;
               }
               $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
             }
         }
       } else {
         $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
       }
     } else {
       $_SESSION["cart_item"] = $itemArray;
     }
   }
 break;
 case "remove":
   if(!empty($_SESSION["cart_item"])) {
     foreach($_SESSION["cart_item"] as $k => $v) {
         if($_GET["code"] == $k)
           unset($_SESSION["cart_item"][$k]);
         if(empty($_SESSION["cart_item"]))
           unset($_SESSION["cart_item"]);
     }
   }
 break;
 case "empty":
   unset($_SESSION["cart_item"]);
 break;
}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <title></title>
  <link href="style.css" type="text/css" rel="stylesheet" />
  <link href="css/shop.css" rel='stylesheet' type='text/css' />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <link href="css/sidebar.css" rel='stylesheet' type='text/css' />
  <link href="css/sidenav.css" rel='stylesheet' type='text/css' />
  <script type="text/javascript" language="javascript" src="js/jquery-3.2.1.js"></script>
  <script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,s initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
    </style>
<body>
<div class="header">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="header-left">
<div class="logo">
<a href="index.html"><img class="logo1" src="images/logo1.png" alt=""/></a>


<div class="menu">

<a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
<ul class="nav" id="nav">



    	  <li><a class="active" href="home.php">HOME</a></li>
    	  <li><a href="shop.php">SHOP</a></li>
    	  <li><a href="customize.php">CUSTOMIZE</a></li>
    	  <li><a href="contactUS.php">CONTACT</a></li>
    	  <li><a href="about.php">ABOUT</a></li>
         <li><a href="logout.php">LOGOUT</a></li>

</ul>

<script type="text/javascript" src="js/responsive-nav.js"></script>
</div>
<div class="clear"></div>
</div>




            <!-- start search-->
              <div class="search-box">
              <div id="sb-search" class="sb-search">
              <form>
                  <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                  <input class="sb-search-submit" type="submit" value="">
                  <span class="sb-icon-search"> </span>
              </form>
              </div>
              </div>
            <!----search-scripts---->
            <script src="js/classie.js"></script>
            <script src="js/uisearch.js"></script>
            <script>
              new UISearch( document.getElementById( 'sb-search' ) );
            </script>
            <!----//search-scripts---->

                <a href="#"><img src="images/edit.png" alt=""/></a>
                <a href="#"><img src="images/close_edit.png" alt=""/></a>
              </div>

          <div class="clear"></div>
          </div>
         </div>
         </div>
         </div>
         </div>

  <div class="container">

    <h3>checkout</h3>
    <?php
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
    ?>
    <table cellpadding="10" cellspacing="1">
    <tbody>
    <tr>
    <th style="text-align:left;"><strong>Name</strong></th>
    <th style="text-align:left;"><strong>Code</strong></th>
    <th style="text-align:right;"><strong>Quantity</strong></th>
    <th style="text-align:right;"><strong>Price</strong></th>
    <th style="text-align:center;"><strong>Action</strong></th>
    </tr>
    <form method="POST" action="checkoutconfirm.php" class="top-space">
      <?php
          foreach ($_SESSION["cart_item"] as $item){
      		?>
      				<tr>
      				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["productname"]; ?></strong></td>
      				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
      				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
      				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "₱".$item["price"]; ?></td>
      				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="checkout.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
      				</tr>
      				<?php
              $item_total += ($item["price"]*$item["quantity"]);
      		}
      		?>

      <tr>
      <td colspan="5" align=right><strong>Total:</strong> <?php echo "₱".$item_total; ?></td>
      </tr>
      <!–for table reserved person->
      <body class="con-bg">
        <div class="container">
          <h3>Pleae enter your information</h3>
          <form method="POST" action="checkoutconfirm.php" class="top-space">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="name">*First name and last name:</label>
                <input type="text" class="form-control" id="customername" name="customername" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <label for="code">*Phone number:</label>
                <input type="text" class="form-control" id="ctno" name="ctno" placeholder="Phone number" required="" min="09000000000" max="09999999999">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                  <form action="checkoutconfirm.php" method="post">
                    <input type="submit"  id="code" name="submit" value="confirm"/>
                  </form>
              </div>
            </div>

          </form>
        </div>
      </body>
      <!–end of table reserved person->
    </form>
  </div>
  <?php
  }
  ?>
</body>

</html>
