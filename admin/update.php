<?php
require_once 'init.php';

if(!empty($_POST['code'])&&!empty($_POST['price']) ){
$sql = "SELECT  code FROM tblproduct where code=:code";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':code',$_POST['code']);

        if($stmt->execute()){

            $sql = "UPDATE tblproduct SET price = :price WHERE code = :code ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':price',$_POST['price']);
            $stmt->bindParam(':code',$_POST['code']);


            if($stmt->execute()){
              echo ("<script language='JavaScript'>
                window.alert('Update Success!')
                window.location.href='price.php';
                </script>");
            }
        else {
          echo "<script language='JavaScript'>
            window.alert('Code not found!')
            window.location.href='price.php';
            </script>";
          }

        }

}
elseif(!empty($_POST['code']) ){
  echo "<script language='JavaScript'>
    window.alert('Please fill the textbox for the price')
    window.location.href='price.php';
    </script>";
}
elseif(!empty($_POST['price']) ){
  echo "<script language='JavaScript'>
    window.alert('Please fill the textbox for the code')
    window.location.href='price.php';
    </script>";
}
else{
  echo "<script language='JavaScript'>
    window.alert('Please fill all the fields!')
    window.location.href='price.php';
    </script>";
  }






 ?>
