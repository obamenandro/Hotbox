<?php
require_once 'init.php';
$sel = "SELECT * FROM reservedproduct WHERE `randomizer` = :id1";
$data = $conn->prepare($sel);
$data->bindParam(":id1",$_GET['random']);
$data->execute();
while($res = $data->fetch(PDO::FETCH_ASSOC)){
  $sql = "INSERT INTO `soldproduct` VALUES (:id, :code, :name, :rproductname, :squantity, :price, :rando)";
  $insert = $conn->prepare($sql);
  $insert->bindParam(":id",$res['id']);
  $insert->bindParam(":code",$res['code']);
  $insert->bindParam(":name",$res['customername']);
  $insert->bindParam(":rproductname",$res['rproductname']);
  $insert->bindParam(":squantity",$res['rquantity']);
  $insert->bindParam(":price",$res['price']);
  $insert->bindParam(":rando",$res['randomizer']);
  if($insert->execute()){
    $sql1 = "DELETE FROM reservedproduct where `randomizer` = :id1";
    $data1 = $conn->prepare($sql1);
    $data1->bindParam(":id1",$_GET['random']);
    if($data1->execute()){
    echo ("<script language='JavaScript'>
      </script>");
    }
    else {
      echo "may problema sa delete pre.";
    }
  }
  else{
    echo "may problema pree";
  }
}
echo ("<script language='JavaScript'>
  window.alert('Product Sold!');
  window.location.href='report.php';
  </script>");
 ?>
