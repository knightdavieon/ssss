<?php require_once('Connection_ecleaning.php');  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Accounts</title>
     <link rel="Shortcut icon" href="icon/SWLogoIcon.png">
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
            <?php include('header_ecleaning.php'); ?>
        <!-- Left navbar-header -->
           <?php include('navbar_ecleaning.php'); ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add New Account</h4> </div>
                  
                        <ol class="breadcrumb">
                               <?php include('user_identifier.php'); ?>  
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <div class="col-md-offset-0" style="margin-left:5px;">
               <?php 
                $e_query = "Select * from users where username = '" . $_SESSION['username'] . "' and password = '" . $_SESSION['password'] . "'";
                $e_result = mysqli_query($conn, $e_query);
                if($e_rows = mysqli_fetch_array($e_result)){
                  ?>
                  <a href="edit_account.php?ecode=<?php echo stripslashes($e_rows[0]); ?>" class="btn btn-info" title="Edit Account"><i class="fa fa-pencil"></i> </a>
                <?php
                }
               ?>
                
                <a href="#" class="btn btn-warning" title="View Account"><i class="fa fa-eye"></i> </a>
                <a href="#" class="btn btn-danger" title="Deactivate Account"><i class="fa fa-remove"></i> </a>
                </div>
                <!--row -->
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">  Account </h3>
                            <hr>
                            <label> Employee Code </label>
                            <input type="text" class="form-control" id="ecode">
                            <label style="margin-top:10px;"> Name </label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" placeholder="LASTNAME, FIRSTNAME, MIDDLENAME" id="full_name">
                            <label style="margin-top:10px;"> User Type </label>
                            <select class="form-control" style="cursor:pointer;" id="user_type"> 
                                  <option disabled="disabled" selected value="default"> ---- SELECT CATEGORY ---- </option>
                                  <option value="ENCODER"> ENCODER </option>
                                  <option value="ADMINISTRATOR"> ADMINISTRATOR </option>
                            </select>
                            <label style="margin-top:10px;"> Username </label>
                            <input type="text" class="form-control" id="username">
                            <label style="margin-top:10px;"> Password </label>
                            <input type="text" id="o_password" class="form-control">
                            <label style="margin-top:10px;"> Confrim Password </label>
                            <input type="password" id="c_password" class="form-control">
                    </div>
                </div>
              
             
               
            </div>
     
                        <button type="button" id="btn_save" class="btn btn-info" style="margin-top:20px;"> Save Changes </button>
             <script src="jquery/jquery-2.2.3.min.js"> </script>
             <script> 
                   $('#btn_save').click(function(){
                       var ecode = $('#ecode').val();
                       var  full_name = $('#full_name').val();
                       var username = $('#username').val();
                       var password = $('#o_password').val();
                       var confirm_password = $('#c_password').val();
                       var user_type = $('#user_type').val();
                       if(document.getElementById("ecode").value == ""){
                           alert("Empty Fields cannot be valid");
                       }else if(document.getElementById("full_name"). value == ""){
                          alert("Empty Fields cannot be valid");
                       }
                       else if(document.getElementById("username").value == ""){
                          alert("Empty Fields cannot be valid");
                       }
                       else if(document.getElementById("o_password").value == ""){
                          alert("Empty Fields cannot be valid");
                       }else if(document.getElementById("c_password").value == ""){
                          alert("Empty Fields cannot be valid");
                       }else if(document.getElementById("user_type").value == ""){
                          alert("Empty Fields cannot be valid");
                       }else{
                       $.ajax({
                           type:"POST",
                           url:"account_ecleaning_query.php",
                           data:{ecode:ecode, full_name:full_name, username:username, o_password:password, user_type:user_type, c_password:confirm_password},
                           success:function(result){
                             alert(result); 
                           }
                       });
                 }
               });
               
                   	
                   
              </script>
            <!-- /.container-fluid -->
            <?php include('footer_ecleaning.php'); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <!-- Data Table API   -->
 
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
         <!--  <script src="jquery/jquery-2.2.3.min.js"></script> --> 

    <script>
        $(document).ready(function(){
         $('#list_table').DataTable();
        });
      </script>
<!--

    <script type="text/javascript">
    $(document).ready(function() {

        $.toast({
            heading: 'Welcome to Pixel admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
   
    </script> -->
</body>

</html>
