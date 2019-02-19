<?php require_once('Connection_ecleaning.php'); ?>
<?php 
    if(isset($_REQUEST['ecode'])){
    	  $ecode = addslashes(trim($_REQUEST['ecode']));
    	  $full_name = utf8_encode(addslashes(trim($_REQUEST['full_name'])));
    	  $full_name = strtoupper($full_name);
    	  $username = utf8_encode(addslashes(trim($_REQUEST['username'])));
    	  $password = addslashes(trim($_REQUEST['o_password']));
    	  $confirm_password = addslashes(trim($_REQUEST['c_password']));
    	  $user_type = addslashes(trim($_REQUEST['user_type']));
    	  $validation_query = "Select * from users where username = '" . $username . "' and password = '" . $password . "'";
    	  $validation_result = mysqli_query($conn, $validation_query);
    	  $validation_count = mysqli_num_rows($validation_result);
    	  if($validation_count > 0){
    	  	  echo 'This Employee Code Already Exists try to use other sequence of codes';
    	  }else{
    	  if(($password) != ($confirm_password)){
    	  	 echo 'Password Does not matched';
    	  }else{
    	  	$query = "Insert into users(employee_code, full_name, username, password, status, user_level)values('" . $ecode . "','" . $full_name . "','" . $username . "','" . $password . "','" . "ACTIVE" . "','" . $user_type . "')";
    	  $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));

    	  if($result === true){
    	  	 echo 'Successfully Registered';
    	  }else{
    	  	 echo 'Failed';
    	  }
    	}
      }
    }
?>