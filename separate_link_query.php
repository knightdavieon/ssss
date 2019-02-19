<?php 
// Email Query
require_once("Connection.php");
date_default_timezone_set('Asia/Manila');
$d = date('d');
$m = date('m');
$y = date('Y');
$full_date = $m . "/" . $d . "/" . $y;
   require_once('Connection.php');
   require_once('PHPMailer-5.2.26/class.pop3.php');
  require_once('PHPMailer-5.2.26/class.smtp.php');
   require_once('PHPMailer-5.2.26/class.phpmailer.php');
   require_once('PHPMailer-5.2.26/PHPMailerAutoload.php');

  if(isset($_REQUEST['invoice_number'])){
    $invoice = addslashes(trim($_REQUEST['invoice_number']));
    $full_name = addslashes(trim($_REQUEST['full_name']));
    $full_name = strtoupper($full_name);
    $email = addslashes(trim($_REQUEST['email']));
    $item_purchased = addslashes(trim($_REQUEST['item_purchased']));
    $item_purchased = strtoupper($item_purchased);
    $phone_number = addslashes(trim($_REQUEST['phone_number']));
    $branches = addslashes(trim($_REQUEST['branches']));
  //   $online_store = addslashes(trim($_REQUEST['online_store']));
   $mail= new PHPMailer();
   //$mail->IsSMTP();
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = 'ssl';
  // $mail->SMTPDebug = 2;
   $mail->IsHTML(true);
   $mail->Host= "smtp.gmail.com";
   $mail->Port= 465;
   $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
   );
   $mail->Username = "noreply.silverworks@gmail.com";
   $mail->Password = "noreply1406";
   $mail->SetFrom("noreply.silverworks@gmail.com");
   $mail->Subject = "Silverworks Free Cleaning Registration";
   $mail->Body = "GOOD DAY VALUED CUSTOMER!" . "<br/><br/>" . "Thank you for registering at our E-cleaning service." . "<br/><br/>". "Your invoice number is $invoice." . "<br/><br/>" . "You can avail our FREE SHIPPING  with the minimum purchase of 1,000 on our website."  . "<br/><br/>" . "<a href='silverworks.com'> www.silverworks.com </a>" . "<br/><br/>" . "or you can check out our official store in LAZADA for hot deals and flash sale." . "<br/>" . "<a href='http://www.lazada.com.ph/silverworks-official-store/'> http://www.lazada.com.ph/silverworks-official-store/ </a>";
    $mail->AddAddress($email);
   if(!$mail->Send()){
    echo "There was a problem to your email, Please check carefully if your email has been typed correctly";
   }else{
if($branches == "ONLINE"){
       $query = "Insert sw_tbl_cleaning(invoice, full_name, email, phone_number, item, branches, status, date_registration)values('" . $invoice . "','" . $full_name . "','" . $email . "','" . $phone_number . "','" . $item_purchased . "','" . mysqli_real_escape_string($conn, $_REQUEST['online_store']) . "','" . "OLD" . "','" . $full_date . "')";
    $result = mysqli_query($conn, $query) or die("Error : " . mysqli_error($conn));
    if($result === true){
           echo "<div class='alert alert-success col-md-8'> <strong> Success!</strong> Request sent, Please check your email for your registration information </div>";
    }else{
        echo 'Failed';
    }
}else{
     $query = "Insert sw_tbl_cleaning(invoice, full_name, email, phone_number, item, branches, status, date_registration)values('" . $invoice . "','" . $full_name . "','" . $email . "','" . $phone_number . "','" . $item_purchased . "','" . $branches . "','" . "OLD" . "','" . $full_date . "')";
    $result = mysqli_query($conn, $query) or die("Error : " . mysqli_error($conn));
    if($result === true){
           echo "<div class='alert alert-success col-md-8'> <strong> Success!</strong> Request sent, Please check your email for your registration information </div>";
    }else{
        echo 'Failed';
    } 
}
 
   }
}

?>