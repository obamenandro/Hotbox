<?php
require_once 'init.php';

if(!empty($_POST['code']) ){

        $sql = "DELETE FROM tblproduct where code=:code";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':code',$_POST['code']);


        if($stmt->execute()){
          echo ("<script language='JavaScript'>
            window.alert('The product has been deleted')
            window.location.href='main1.php';
            </script>");
        }
        else {
          echo "<script language='JavaScript'>
            window.alert('Code not found!')
            window.location.href='main1.php';
            </script>";
          }

  }
else {
  echo "<script language='JavaScript'>
    window.alert('Code not found!')
    window.location.href='main1.php';
    </script>";
  }


 ?>
