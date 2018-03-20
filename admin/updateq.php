<?php
require_once 'init.php';

if(!empty($_POST['code'])&&!empty($_POST['quantity']) ){
$sql = "SELECT  code FROM tblproduct where code=:code";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':code',$_POST['code']);

if($stmt->execute()){

        $sql = "UPDATE tblproduct SET quantity = :quantity WHERE code = :code ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':quantity',$_POST['quantity']);
        $stmt->bindParam(':code',$_POST['code']);


        if($stmt->execute()){
          echo ("<script language='JavaScript'>
            window.alert('Update Success!')
            window.location.href='inventory.php';
            </script>");
        }
        else {
          echo "<script language='JavaScript'>
            window.alert('Code not found!')
            window.location.href='inventory.php';
            </script>";
          }

  }

}
elseif(!empty($_POST['code']) ){
  echo "<script language='JavaScript'>
    window.alert('Please fill the textbox for the inventory')
    window.location.href='inventory.php';
    </script>";
}
elseif(!empty($_POST['price']) ){
  echo "<script language='JavaScript'>
    window.alert('Please fill the textbox for the code')
    window.location.href='inventory.php';
    </script>";
}
else {
  echo "<script language='JavaScript'>
    window.alert('Update Failed!')
    window.location.href='inventory.php';
    </script>";
  }






 ?>
