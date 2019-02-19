<?php require_once('Connection_ecleaning.php'); ?>
<?php 
    if(isset($_POST['btn_import'])){
    	
         $fopen = addslashes(trim($_FILES['file_name']['tmp_name']));
         $fhandler = fopen($fopen, "r");
         if(empty($fhandler))
         fgetcsv($fhandler);
         $var = false;
         while(($fhandler_rows = fgetcsv($fhandler, 1000, ",")) !== false){
         	 $fhandler_rows = array_map('utf8_encode', $fhandler_rows);
         	  $query = "Insert into sw_tbl_cleaning(invoice, full_name, email, phone_number, item, branches , status, date_registration)values('" . $fhandler_rows[0] . "','" . $fhandler_rows[1] . "','" . $fhandler_rows[2] . "','" . $fhandler_rows[3] . "','" . $fhandler_rows[4] . "','" . $fhandler_rows[5] . "','" . $fhandler_rows[6] . "','" . $fhandler_rows[7] . "')";
         	  $result = mysqli_query($conn, $query) or die("Error : " . mysqli_error($conn));
         	  if($result === true){
         	  	      $var = true;
         	  }else{
         	  	     $var = false;
         	  }
         }
             if($var){
             	  echo "Successfully Imported";
             }
    }
?>

<!DOCTYPE html>
<html lang="en">
   <head> 
      <title> Sample Product ite </title>
   </head>
     <body>
           <form method="post" action="data_import.php" enctype="multipart/form-data">
                <input type="file" name="file_name">
                <button type="submit" name="btn_import"> Proceed To Import </button>
           </form>
        </body>
 </html>