<?php require_once('Connection_ecleaning.php'); ?>
<?php 
   if(isset($_REQUEST['uid'])){
   	   $invoice_number = addslashes(trim($_REQUEST['invoice_number']));
   	   $full_name = utf8_encode(addslashes(trim($_REQUEST['full_name'])));
   	   $full_name = strtoupper($full_name);
   	   $item = utf8_encode(addslashes(trim($_REQUEST['item'])));
   	   $email = utf8_encode(addslashes(trim($_REQUEST['Email'])));
   	   $phone_number = addslashes(trim($_REQUEST['phone_number']));
   	   $DOR = addslashes(trim($_REQUEST['date_registration']));
   	   $branches = utf8_encode(addslashes(trim($_REQUEST['branch_value'])));
   	   $status = addslashes(trim($_REQUEST['status_value']));
   	   $query = "Update sw_tbl_cleaning set full_name = '" . $full_name . "', email ='" . $email . "', phone_number = '" . $phone_number . "', item = '" . $item . "', branches = '" . $branches . "', status = '" . $status . "' where unique_id = '" . mysqli_real_escape_string($conn, $_REQUEST['uid']) . "'";
   	   $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
   	   if($result === true){
   	   	  echo 'Successfully Modified';
   	   }else{
   	   	   echo 'Failed to modify data';
   	   }
   }
?>