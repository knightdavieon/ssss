<?php include('Connection_ecleaning.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title> Dashboard</title>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="jquery/jquery-2.2.3.min.js"></script>
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
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                             <?php include('user_identifier.php'); ?>     
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <!--col -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">Registered Customers</h5> </div>
                                    <?php 
                                      $old_query = "Select * from sw_tbl_cleaning";
                                      $old_result = mysqli_query($conn, $old_query);
                                      $old_count = mysqli_num_rows($old_result);
                                    ?>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger"><?php echo $old_count; ?></h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                 
                    <!-- /.col -->
                     <div class="col-md-8 col-sm-12 col-xs-12">
                         <div class="white-box">
                             <h3 class="box-title"> Registration Graph </h3>
                            <div id="registration_graph"> </div>
                         
                                
                                <script type="text/javascript"> 
                                    google.load("visualization", "1", {packages:["corechart"]});
                                    google.setOnLoadCallback(drawChart);
                                    function drawChart(){
                                        var data = new google.visualization.DataTable();
                                        var data = google.visualization.arrayToDataTable([
                                         ['Branch Name', 'Registration Date'],
                                         <?php 
                                        $fquery = "Select * from sw_tbl_seo";
                                        $fresult = mysqli_query($conn, $fquery)or die("Error :" . mysqli_error($conn));
                                        while($frows = mysqli_fetch_array($fresult)){
                                            echo "['" . $frows[0] . "'," . $frows[1] . "],";
                                        }
                                      ?>
                                    ]);
                                     var options = {
                                       title: 'Registration By Month'
                                       };
                                     var chart = new google.visualization.LineChart(document.getElementById('registration_graph'));
                                     chart.draw(data, options);
                                 }

                                    
                                 </script>
                                  
                          </div>
                       </div>
                       <div class="col-md-4 col-sm-12 col-xs-12">
                           <div class="white-box">
                              <h3 class="box-title"> Total Registered Persons </h3>
                              <div id="histochart"> </div>

                              <script type="text/javascript">
                                 google.load("visualization", "1", {packages:["corechart"]});
                                 google.setOnLoadCallback(histoChart);
                                   function histoChart(){
                                        var data = new google.visualization.DataTable();
                                        var data = google.visualization.arrayToDataTable([
                                         ['Branch Name', 'Registration Date'],
                                         <?php 
                                        $fquery = "Select * from sw_tbl_cleaning";
                                        $fresult = mysqli_query($conn, $fquery)or die("Error :" . mysqli_error($conn));
                                        $fcount = mysqli_num_rows($fresult);
                                        while($frows = mysqli_fetch_array($fresult)){
                                            echo "['" . "Total of Persons" . "'," . $fcount . "],";
                                        }
                                      ?>
                                    ]);
                                     var options = {
                                       title: 'Total'
                                       };
                                     var chart = new google.visualization.Histogram(document.getElementById('histochart'));
                                     chart.draw(data, options);
                                 }
                                </script>
                        </div>
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
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to Silverworks E-Cleaning Backend',
            text: 'Use this page for editing data, Viewing, and Checking information that has been stored by the customers of Silverworks',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
</body>

</html>
