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
    <title>Add New Branch</title>
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
                        <h4 class="page-title">Add New Branch</h4> </div>
                  
                        <ol class="breadcrumb">
                           <?php include('user_identifier.php'); ?>     
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!--row -->
                <div class="row">
                    <div class="col-md-8 col-sm-10 col-xs-10">
                        <div class="white-box">
                            <h3 class="box-title"> Add New Branch  </h3>
                            <hr>
                         <div class="row">
                                <div class="col-md-12 col-sm-10 col-xs-10" style="margin-top:20px;">
                                     <div class="col-md-11 col-sm-10 col-xs-10">
                                      <label> Branch Code </label>
                                      <input type="text" class="form-control" id="branch_code" style="text-transform:uppercase;">
                                     </div>
                                     <div class="col-md-11 col-sm-10 col-xs-10" style="margin-top:10px;">
                                      <label> Branch Name </label>
                                      <input type="text" class="form-control" id="branch_name" style="text-transform:uppercase;">
                                     </div>
                                     <div class="col-md-11 col-sm-10 col-xs-10" style="margin-top:10px;">
                                      <label> Branch Location </label>
                                        <select class="form-control" id="branch_location" style="cursor:pointer;">
                                            <option value="default" selected disabled="disabled"> ---- SELECT CATEGORY ---- </option>
                                            <option value="MM1"> METRO MANILA 1 </option>
                                            <option value="MM2"> METRO MANILA 2 </option>
                                            <option value="SOUTH"> SOUTH LUZON </option>
                                            <option value="NORTH"> NORTH LUZON </option>
                                            <option value="VIZMIN"> VIZMIN </option>
                                         </select>
                                     </div>
                                </div>
                        </div>
                       
                    </div>
                </div>
             
               
            </div>
     
                        <button type="button" id="btn_save" class="btn btn-info" style="margin-top:20px;"> Save Changes </button>
             <script src="jquery/jquery-2.2.3.min.js"> </script>
             <script> 
                  $('#btn_save').click(function(){
                     var branch_code = $('#branch_code').val();
                     var branch_name = $('#branch_name').val();
                     var branch_location = $('#branch_location').val();
                     if(document.getElementById("branch_code").value == ""){
                        alert("Fields Cannot Be Null");
                     }else if(document.getElementById("branch_name").value == ""){
                        alert("Fields Cannot Be Null");
                     }else if(document.getElementById("branch_location").value == "default"){
                        alert("Please Select Location First");
                     }else{
                     $.ajax({
                        type:"POST",
                        url:"add_new_query_ecleaning.php",
                        data:{branch_code:branch_code, branch_name:branch_name, branch_location:branch_location},
                        success:function(result){
                            alert(result);
                            if(result === "Successfully Added"){
                            	$('#branch_code').val("");
                                $('#branch_name').val("");
                                $('#branch_location').val(""); 
                            }
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
