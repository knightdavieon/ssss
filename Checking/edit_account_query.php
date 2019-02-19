<?php require_once('Connection_ecleaning.php'); ?>
<?php 
    if(isset($_REQUEST['ecode'])){
    	 $ecode = addslashes(trim($_REQUEST['ecode']));
    	 $name = utf8_encode(addslashes(trim($_REQUEST['full_name'])));
    	 $user_type = addslashes(trim($_REQUEST['user_type']));
    	 $username = addslashes(trim($_REQUEST['username']));
         $o_password = addslashes(trim($_REQUEST['o_password']));
         $c_password = addslashes(trim($_REQUEST['c_password']));
         $account_status = addslashes(trim($_REQUEST['account_status']));
         if(($o_password) != ($c_password)){
         	echo "Password Not Matched";
         }else{
           $query = "Update users set full_name = '" . $name . "' ,username = '" . $username . "' ,password = '" . $o_password . "',status= '". $account_status . "' ,user_level='" . $user_type . "' where employee_code = '" . $ecode . "'";
         $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
         if($result === true){
         	 echo "true";
         }else{
         	 echo "Failed";
         }	
         }
         
    }
?>