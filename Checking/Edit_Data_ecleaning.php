<?php require_once('Connection_ecleaning.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Edit Data</title>
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
                        <h4 class="page-title">Edit Page</h4> </div>
                  
                        <ol class="breadcrumb">
                            <li><a href="#">Edit Page</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              
          
                <!--row -->
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"> Edit Page </h3>

                           <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
                                    <?php 
                                      $get_query = "Select * from sw_tbl_cleaning where unique_id = '" . stripslashes($_GET['uid']) .  "'";
                                      $get_result = mysqli_query($conn, $get_query);
                                      if($get_rows = mysqli_fetch_array($get_result)){
                                    ?>
                                      <label> Invoice Number </label>
                                      <input type="text" value="<?php echo $get_rows[0]; ?>" class="form-control" onkeypress="return isNumber(event);" maxlength="50" id="invoice_number" disabled="disabled">
                                      <!-- Unique ID -->
                                      <input type="hidden" value="<?php echo $get_rows['unique_id']; ?>" id="uid">
                                      <label style="margin-top:10px;"> Full Name </label>
                                      <input type="text" class="form-control" value="<?php echo $get_rows[1]; ?>" style="text-transform:uppercase;" maxlength="50" id="full_name">
                                      <label style="margin-top:10px;"> Email </label>
                                      <input type="text" class="form-control" value="<?php echo $get_rows[2]; ?>" maxlength="50" id="Email">
                                      <label style="margin-top:10px;"> Phone Number </label>
                                      <input type="text" class="form-control" value="<?php echo $get_rows[3]; ?>" id="phone_number">
                                      <label style="margin-top:10px;"> Item </label>
                                      <input type="text" class="form-control" style="text-transform:uppercase;" maxlength="50" value="<?php echo $get_rows[4]; ?>" id="item">
                                       <label style="margin-top:10px;"> Date of Registration </label>
                                      <input type="text" disabled="disabled" class="form-control" maxlength="50" value="<?php echo $get_rows[7]; ?>" id="date_registration">
                                    
                                
                                </div>
                        </div>

                        
                    </div>
                  

                </div>

               <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="white-box">
                           <h3 class="box-title"> Branch Name </h3>
                           <hr>
                           <div class="col-md-7 col-sm-8  col-xs-8">
                           <label> Current Branch Designation : </label>
                           </div>
                            <div class="col-md-4 co-sm-4 col-xs-4">
                           <label style="color:#29a329;"><?php echo $get_rows[5]; ?></label>
                           </div>
                           
                           <select class="form-control" style="cursor:pointer;" id="branch" onchange="onchange_branch()">
                                <option selected disabled="disabled"> ---- SELECT CATEGORY ---- </option>
                                <?php 
                                  $branch_query = "Select * from sw_tbl_branches";
                                  $branch_result = mysqli_query($conn, $branch_query);
                                  while($branch_rows = mysqli_fetch_array($branch_result)){
                                  ?>
                                  <option value="<?php echo $branch_rows[1]; ?>"><?php echo $branch_rows[2]; ?></option>
                                <?php
                                  }
                                ?>

                             </select>
                             <input type="hidden" value="<?php echo $get_rows[5]; ?>" id="branch_value">
                             <script type="text/javascript">
                               function onchange_branch(){
                                document.getElementById("branch_value").value = document.getElementById("branch").value;
                               }
                               </script>
                       </div>        
                 </div>
                 <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="white-box">
                      <h3 class="box-title"> Invoice Status </h3>
                           <hr>
                           <label> Current Status : </label> <?php echo $get_rows[6]; ?>
                           <select class="form-control" style="cursor:pointer;" id="status" onchange="onchange_status();">
                                <option selected disabled="disabled"> ---- SELECT CATEGORY ---- </option>
                                <option value="OLD">OLD INVOICE</option>
                                <option value="NEW">NEW INVOICE</option>
                             </select>
                             <input type="hidden" value="<?php echo $get_rows[6]; ?>" id="status_value">
                       </div>        
                 </div> 
                 <script type="text/javascript">
                      function onchange_status(){
                        document.getElementById("status_value").value = document.getElementById("status").value;
                      }
                    </script>
               
            </div>
                <?php } ?>
            
             <a href="Edit_Page_ecleaning.php" class="btn btn-primary" style="margin-top:10px;"><i class="fa fa-arrow-left"></i> Return </a>
                        <button type="button" class="btn btn-info" style="margin-top:10px;" id="save_changes"><i class="fa fa-check"></i> Save Changes </button>
           
            <!-- /.container-fluid -->
            <?php include('footer_ecleaning.php'); ?>
        </div>
        <script src="jquery/jquery-2.2.3.min.js"> </script>
        <script>
            $('#save_changes').click(function(){
              var invoice_number = $('#invoice_number').val();
              var full_name = $('#full_name').val();
              var email  = $('#Email').val();
              var phone_number = $('#phone_number').val();
              var item = $('#item').val();
              var dor = $('#date_registration').val();
              var branch_value = $('#branch_value').val();
              var status_value = $('#status_value').val();
              var uid = $('#uid').val();
              $.ajax({
                type:"POST",
                url:"Edit_data_query_ecleaning.php",
                data:{invoice_number:invoice_number, full_name:full_name, Email:email, phone_number:phone_number, item:item, date_registration:dor, branch_value:branch_value, status_value:status_value, uid:uid},
                success:function(result){
                   alert(result);
                   if(result == "True"){
                      window.location = "Edit_Data_ecleaning.php?invoice="+invoice_number + "&name="+ full_name;
                   }  
                }
              }); 
            });
        </script>
        
       <script type="text/javascript">
                                               // register jQuery extension
   
                                                        function isNumber(evt){
                                                            evt = (evt) ? evt: window.event;
                                                            var charCode = (evt.which) ? evt.which:evt.keyCode;
                                                            if(charCode > 31 && (charCode < 48 || charCode > 57)){
                                                                 return false;
                                                                 
                                                            }
                                                            return true;
                                                        }

                                                 </script>
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
