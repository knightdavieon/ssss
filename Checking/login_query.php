<?php 
session_start();
require_once("Connection_ecleaning.php"); ?>
<?php 
   if(isset($_REQUEST['username'])){
      $username = addslashes(trim($_REQUEST['username']));
      $password = addslashes(trim($_REQUEST['password']));
      $query = "Select * from users where username = '" . $username . "' and password = '" . $password . "'";
      $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
      $check = mysqli_num_rows($result);
      if($check > 0){
         echo "true";
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         $_SESSION['checking'] = "True";
         
      }else{
        echo "failed"; 
      }
   }
?>