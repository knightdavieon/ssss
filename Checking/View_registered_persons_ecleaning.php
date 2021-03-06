<?php require_once('Connection_ecleaning.php'); ?>
<?php

  date_default_timezone_set('Asia/Manila');
  $beg_date = date('m') . '/' . '01' . '/' . date('Y');
  $day = date('d');
  if($day < 10){
      $day = '0' . $day;
  }
 
  $date = date('m') . '/' . $day . '/' . date('Y');
   if(isset($_POST['btn_download'])){
    ob_end_clean();
    $output = fopen('php://output', 'w');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=SWcleanerdata14067.csv');
    $query = "Select * from sw_tbl_cleaning";
    $result = mysqli_query($conn, $query);
    $array = array();
    fputcsv($output, array('INVOICE NUMBER', 'FULL NAME', 'EMAIL', 'PHONE NUMBER', 'ITEM', 'BRANCH DESIGNATION', 'STATUS', 'REGISTRATION DATE'));
    while($rows = mysqli_fetch_array($result)){
      $array[] = $rows;
    }
    foreach($array as $frows){
      fputcsv($output, array('INVOICE NUMBER'=>$frows[0], 
        'FULL NAME'=>$frows[1], 
        'EMAIL'=>$frows[2], 
        'PHONE NUMBER'=>$frows[3],
         'ITEM'=>$frows[4], 
         'BRANCHES'=>$frows[5], 
        'STATUS'=>$frows[6], 
        'DATE OF REGISTRATION'=>$frows[7]));

    }
    exit();
   }
?>
<?php
ini_set('max_execution_time',0);
ini_set('memory_limit', '-1');
?>
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
<script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
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
                        <h4 class="page-title">Registered Customers</h4> </div>
                  
                        <ol class="breadcrumb">
                            <?php include('user_identifier.php'); ?>     
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              
          
                <!--row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title"> Registered Customers </h3>
                            
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                            <?php 
                            $query = "Select * from sw_tbl_cleaning";
                            $result = mysqli_query($conn, $query);
                            $count = mysqli_num_rows($result);
                            ?>
                              <p class="box-title"> There were "<?php echo $count; ?>" customers has already been registered </p>
                            <hr>
                            <div class="col-md-offset-11">
                            <button name="btn_download" class="btn btn-info"><i class="fa fa-download"></i> Export </button>
                            </div>
                            
                          
                            <div class="row">
                                
                                <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
                                    <label> New Update </label>
                                    <ul>
                                        <li> Please use the search by category to find the customer info and supply the textbox with information regarding to the selected category and press search. </li>
                                        <li> If you want to load all the data select the Load All Data in drop down then press the search button and wait to retrieve the data.  </li>
                                     </ul>
                                    <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label> Search by category </label>
                                           <select class="form-control" style="cursor:pointer;" name="category_option" id="cat_option">
                                                     <option disabled="disabled" selected="selected"> --- SELECT CATEGORY --- </option>
                                                      <option value="all_data"> Load All Data </option>
                                                      <option value="invoice_number"> Invoice Number </option>
                                                      <option value="email"> Email </option>
                                                      <option value="customer_name"> Customer Name </option>
                                                 </select>
                                            </div>
                                        <div class="col-md-4 col-lg-4 col-xs-5 col-sm-5">
                                                   <input type="text" name="category_value" id="cat_value" class="form-control" style="margin-top:25px;">
                                               </div>
                                        <button type="button" class="btn btn-primary" id="btn_search" style="margin-top:26px;"> Search </button>
                                       <script type="text/javascript">
                                               
                                                $('#btn_search').click(function(){
                                                    if(document.getElementById("cat_option").value == "all_data"){
                                                        alert("Notice this will take time to load all the data .. Please wait");
                                                        document.getElementById("cat_value").value = "";
                                                    }
                                                    var xmlhttp = new XMLHttpRequest();
                                                    xmlhttp.open("GET", "registered_person_query.php?cat_opt="+ $('#cat_option').val() + "&cat_val=" + $('#cat_value').val(), false);
                                                    xmlhttp.send(null);
                                                    document.getElementById("content_table").innerHTML = xmlhttp.responseText;
                                                    $('#tbl_invoice').DataTable();
                                                    $('#tbl_email').DataTable();
                                                    $('#tbl_name').DataTable();
                                                    $('#tbl_all').DataTable();
                                                });
                                         </script>                                               
                                     </div> 
                                <div class="col-md-12 col-sm-10 col-xs-10" style="margin-top:20px;">
                                <div id="content_table">
                                
                                    <table id="list_table" class="table table-striped table-bordered">
                                         <thead>
                                              <tr>
                                                    <th> Invoice </th>
                                                    <th> Name </th>
                                                    <th> Email </th>
                                                    <th> Item </th>
                                                    <th> Status </th>
                                                    <th> Registration Date </th>
                                                    
                                                 </tr>
                                           </thead>
                                            <tbody>
                                       
                                    <?php
                                           $data_query = "Select * from sw_tbl_cleaning where date_registration limit 0, 100";
                                           $data_result = mysqli_query($conn, $data_query);
                                            while($data_rows = mysqli_fetch_array($data_result)){
                                            ?>
                                               <tr>
                                                    <td><a href="data_view_ecleaning.php?invoice_number=<?php echo $data_rows[0]; ?>&amp;name=<?php echo $data_rows[1]; ?>"><?php echo $data_rows[0]; ?></a></td>
                                                    <td><?php echo $data_rows[1]; ?></td>
                                                    <td><?php echo $data_rows[2]; ?></td>
                                                    <td><?php echo $data_rows[4]; ?></td>
                                                    <td><?php echo $data_rows[6]; ?> </td>
                                                    <td><?php echo $data_rows[7]; ?></td>
                                                 </tr>
                                            <?php
                                        } 
                                            ?>
                                              
                                           </tbody>
                                      </table>
                                      </div>
                                </div>
                             </div>
                             

                        </div>
                    </div>
                </div>
              
               
            </div>
            <!-- /.container-fluid -->
            <?php include("footer_ecleaning.php"); ?>
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
