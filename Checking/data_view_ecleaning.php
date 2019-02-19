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
    <title>Registered Customers</title>
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
                        <h4 class="page-title">Persons Information</h4> </div>
                  
                        <ol class="breadcrumb">
                            <li><a href="#">Persons Information</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              
          
                <!--row -->
                <div class="row">
                    <div class="col-md-8 col-sm-10 col-xs-10">
                        <div class="white-box">
                            <h3 class="box-title"> Persons Information </h3>
                            <?php 
                            $full_name = utf8_decode(stripslashes($_GET['name']));
                            $query = "Select * from sw_tbl_cleaning where invoice = '" . stripslashes($_GET['invoice_number']) . "' and full_name = '" . $full_name . "'";
                            $result = mysqli_query($conn, $query);
                            if($rows = mysqli_fetch_array($result)){
                            ?>
                            <p class="box-title"> Information of <?php echo $rows[1]; ?> </p>
                            <?php
                            }
                            ?>
                              
                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-10 col-xs-10" style="margin-top:20px;">

                                    <?php 
                                     $full_name = utf8_decode(stripslashes($_GET['name']));
                                      $fetch_query = "Select * from sw_tbl_cleaning where invoice ='" . stripslashes($_GET['invoice_number']) . "' and full_name = '" . $full_name . "'";
                                      $fetch_result = mysqli_query($conn, $fetch_query);
                                      if($fetch_rows = mysqli_fetch_array($fetch_result)){
                                        ?>

                                     <div class="col-md-7 col-sm-10 col-xs-10">
                                         <label> INVOICE NUMBER :  </label>
                                      </div>    
                                      <div class="col-md-5 col-sm-5 col-xs-5">
                                         <p><?php echo $fetch_rows[0]; ?></p>
                                      </div> 
                                       <div class="col-md-7 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <label> FULL NAME :  </label>
                                      </div>    
                                      <div class="col-md-5 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <p> <?php echo $fetch_rows[1]; ?> </p>
                                      </div>
                                       <div class="col-md-7 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <label> EMAIL :  </label>
                                      </div>    
                                      <div class="col-md-5 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <p> <?php echo $fetch_rows[2]; ?> </p>
                                      </div>
                                       <div class="col-md-7 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <label> PHONE NUMBER :  </label>
                                      </div>    
                                      <div class="col-md-5 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <p> <?php echo $fetch_rows[3]; ?>  </p>
                                      </div>  
                                       <div class="col-md-7 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <label> ITEM :  </label>
                                      </div>    
                                      <div class="col-md-5 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <p> <?php echo $fetch_rows[4]; ?>  </p>
                                      </div>  
                                       <div class="col-md-7 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <label> BRANCH DESIGNATION :  </label>
                                      </div>    
                                      <div class="col-md-5 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <p> <?php echo $fetch_rows[5]; ?>  </p>
                                      </div>  
                                       <div class="col-md-7 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <label> STATUS :  </label>
                                      </div>    
                                      <div class="col-md-5 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <p> <?php echo $fetch_rows[6]; ?>  </p>
                                      </div>
                                      <div class="col-md-7 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <label> DATE OF REGISTRATION :  </label>
                                      </div>    
                                      <div class="col-md-5 col-sm-10 col-xs-10" style="margin-top:5px;">
                                         <p> <?php echo $fetch_rows[7]; ?>  </p>
                                      </div>  
                                <?php
                                      }
                                    ?>
                                </div>
                        </div>
                        <a href="View_registered_persons_ecleaning.php" class="btn btn-primary" style="margin-top:20px;"><i class="fa fa-arrow-left"></i> Return </a>
                    </div>
                </div>
              
               
            </div>
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
