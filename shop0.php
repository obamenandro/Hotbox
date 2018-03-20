
<?php
session_start();
if(!isset($_SESSION['username'])){

 header( "refresh:1.5;url=login.php" );
 die( "Please Log in First! Redirecting shortly...");

}
?>




<?php

require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

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
<html>
<head>
<title>Hotbox Vapeshop</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script type="text/javascript" language="javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-modal.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<img class="logo1" src="images/logo1.png" alt=""/></a>
					 </div>
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
	            <div class="header_right">
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
  <script type="text/javascript" src="js/jquery.flexisel.js"></script>
  </div>
</div>
<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1">
          <div class="overlay"></div>
      </div>
      <div class="hero">
        <hgroup>
            <h1>HOTBOX VAPE SHOP</h1>
            <h3>Numerous mods for your vape!</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">WELCOME TO OUR SHOP</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2">
          <div class="overlay"></div>
      </div>
      <div class="hero">
        <hgroup>
            <h1>HOTBOX VAPE SHOP</h1>
            <h3>Cheap and well built parts!</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">WELCOME TO OUR SHOP</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3">
          <div class="overlay"></div>
      </div>
      <div class="hero">
        <hgroup>
            <h1>HOTBOX VAPE SHOP</h1>
            <h3>Start your own unique vape!</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">WELCOME TO OUR SHOP</button>
      </div>
    </div>
  </div>
</div>
<br>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="shop.php?action=empty">Empty Cart</a></div>
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
<?php
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "₱".$item["price"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="shop.php?action=remove&code=<?php echo $item["code"]; ?>" class="remove">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "₱".$item_total; ?></td>
</tr>
</tbody>
</table>
  <?php
}
?>
</div>
<div class="checkout">
<form action="checkout.php" method="post">
  <input type="submit"  name="submit" value="Checkout"/>
</form>
</div>
<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) {
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="shop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "₱".$product_array[$key]["price"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>

<div class="container"></div>
<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Online Order in Hotbox Vapeshop</h4>
							<li><a href="#">ORDER ONLINE:<br> You can reserve an item via online and we can give you the Tracking number and then you can go to our Shop.</a></li>
              <br>
							<li><a href="#">The Best Deals are here, Hassle-Free and Truly Effortless</a></li>

						</ul>
					</div>
					<img src="images/18.png" alt="Paris" width="150" height="150">
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Top Sale </h4>
							<li><a href="#">Mods</a></li>
							<li><a href="#">Atomizer</a></li>
							<li><a href="#">Battery</a></li>
							<li><a href="#">Juice</a></li>
							<li><a href="#">Charger</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Customer Support</h4>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Warranty</a></li>
							<li><a href="#">Replacement Binding Parts</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Newsletter</h4>
							<div class="footer_search">
				    		   <form>


				    		   </form>
					        </div>
							<ul class="social">
							  <li class="facebook"><a href="#"><span> </span></a></li>


						    </ul>

						</ul>
					</div>

				</div>
				<p class="footerage">NOT FOR SALE TO MINORS! <br> Warning: This product contains nicotine, this chemical
cause birth defects or other reproductive harm. Products sold on Hotboxvapeshop.com are not
	smoking cessation products and have not been evaluated by the Food and Drug Administration, prevent or
	cure any disease or condition.</p>
</BODY>
</HTML>
