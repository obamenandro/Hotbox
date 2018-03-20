<?php
require_once 'init.php';
if($_POST['type']  == 'Mod' ){
    $itemType = "Mod";
    $randomizer = rand(0,1000);
    $code = $itemType.$randomizer;
  }
else if($_POST['type']  == 'Atomizer' ){
      $itemType = "Atomizer";
      $randomizer = rand(0,1000);
      $code = $itemType.$randomizer;
    }
else if($_POST['type']  == 'Battery' ){
          $itemType = "Battery";
          $randomizer = rand(0,1000);
          $code = $itemType.$randomizer;
        }
else if($_POST['type']  == 'Juice' ){
          $itemType = "Juice";
          $randomizer = rand(0,1000);
          $code = $itemType.$randomizer;
        }
else {
          $itemType = "Charger";
          $randomizer = rand(0,1000);
          $code = $itemType.$randomizer;
        }
if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['image']) && !empty($_POST['quantity'])&& !empty($_POST['type'])){
      $sql = "INSERT INTO tblproduct(`productname`,`price`,`image`,`quantity`,`type`,`code`) VALUES (:productname,:price,:image,:quantity,:type,:code)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':productname',$_POST['productname']);
      $stmt->bindParam(':price',$_POST['price']);
      $stmt->bindParam(':image',$_POST['image']);
      $stmt->bindParam(':type',$_POST['type']);
      $stmt->bindParam(':quantity',$_POST['quantity']);
      $stmt->bindParam(':code',$code);


              if($stmt->execute()){
                echo ("<script language='JavaScript'>
                  window.alert('Register Success!')
                  window.location.href='register.php';
                  </script>");
              }
              else {
                echo ("<script language='JavaScript'>
                  window.alert('Register Failed!')
                  window.location.href='register.php';
                  </script>");
                }

      }
else{
  echo ("<script language='JavaScript'>
    window.alert('Please fill all the fields!')
    window.location.href='register.php';
    </script>");
}


 ?>
