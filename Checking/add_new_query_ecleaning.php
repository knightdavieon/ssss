<?php include('Connection_ecleaning.php'); ?>
<?php 
   if(isset($_REQUEST['branch_code'])){

   	   $branch_code = strtoupper(addslashes(trim($_REQUEST['branch_code'])));
   	   $branch_name = utf8_encode(addslashes(trim($_REQUEST['branch_name'])));
   	   $branch_name = strtoupper($branch_name);
   	   $branch_location = addslashes(trim($_REQUEST['branch_location']));
   	   $validation_query = "Select * from sw_tbl_branches where branches = '" . $branch_code . "' and branch_name = '" . $branch_name . "'";
   	   $validation_result = mysqli_query($conn, $validation_query);
   	   $validation_count = mysqli_num_rows($validation_result);
   	   if($validation_count > 0){
   	   	   echo 'This branch has already exists in the database';
   	   }else{
   	   	  $insert_query = "Insert into sw_tbl_branches(branches, branch_name, branch_location)values('" . $branch_code . "','" . $branch_name . "','" . $branch_location . "')";
   	   	  $insert_result = mysqli_query($conn, $insert_query);
   	   	  if($insert_result === true){
   	   	  	  echo 'Successfully Added';
   	   	  }else{
             echo 'Failed to add in the database';
   	   	  }
   	   }
   }

?>