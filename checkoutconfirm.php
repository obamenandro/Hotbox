<?php
require_once 'init.php';
require_once 'checkout.php';
foreach ($_SESSION["cart_item"] as $item){
      if(!empty($_POST['customername']) && !empty($_POST['ctno'])){
        $sql = "INSERT INTO reservedproduct(`customername`,`ctno`,`rquantity`,`code`,`price`,`date_reserved`,`randomizer`) VALUES (:customername,:ctno,:quantity,:code,:price,adddate(now(),3),:randomizer)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':customername',$_POST['customername']);
        $stmt->bindParam(':ctno',$_POST['ctno']);
        $stmt->bindParam(':quantity',$item["quantity"]);
        $stmt->bindParam(':code',$item["code"]);
        $stmt->bindParam(':price',$item["price"]);
        $stmt->bindParam(':randomizer',$randomizer);
        if($stmt->execute()){
          echo ("<script language='JavaScript'>
            window.alert('Your item(s) have been reserved!')
            window.location.href='purchasedproduct.php';
            </script>");
        }
        else {
          echo "<script language='JavaScript'>
            window.alert('error purchase!')
            window.location.href='checkout.php';
            </script>";
        }
      }
      else{
        echo ("<script language='JavaScript'>
          window.alert('Please fill all the fields!')
          window.location.href='checkout.php';
          </script>");
      }
}

 ?>
