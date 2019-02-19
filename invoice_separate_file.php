<?php require_once("Connection.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>  CLEANINGPAGE || SILVERWORKS</title>

  
     <link href="assets/css/bootstrap.css" rel="stylesheet" />
   
    <link href="assets/css/scss/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/scss/Dashboard/dist/css/lightbox.min.css">
    <link href="assets/css/scss/custom.css" rel="stylesheet" />
    <link rel="Shortcut Icon" href="assets/Icons/SWLogoIcon.png">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
 

</head>
<body>
         <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> 
                    <div class="container col-md-7 col-md-offset-3" style="margin-top:5%;">
                      <style type="text/css">
                         .panel-default > .panel-heading-custom {
                             background-color: #000;
                             color: #fff;
                             border: solid 1px #000;
                         }
                       </style>
                      <div class="panel panel-default class">
                        <div class="panel-heading panel-heading-custom"> <label> Register First </label> </div>

                        <div class="panel-body"> 
                         <div class="container-fluid col-md-offset-2" style="margin-top:5%;">

                                   <div class="col-md-12 col-sm-10 col-xs-10">
                             
                                           <div class="row">

                                                     <div class="form-group col-md-9 col-sm-11 col-xs-11">

                                                        <label> Invoice Number </label> &nbsp;<label style="color:#e60000;"> * </label>
                                                        <!-- Implements when set only number -- onkeypress="return isNumber(event)" -->
                                                        <input type="text" id="invoice_number"  onchange="filtering();" autocomplete="off" name="invoice_number" class="form-control" required="required" tabindex="1">
                                                        <span id="invoice_e"> </span>
                                                        <div id="response_text"> </div>
                                                        </div>
                                                         <div class="form-group col-md-9 col-sm-11 col-xs-11">
                                                        <label> Branch Name </label>&nbsp;<label style="color:#e60000;"> * </label>
                                         <select name="branches" class="form-control" style="cursor:pointer;" id="branches" id=" branches" required="required"  tabindex="2" onchange="online_show();">
                                                   <option selected="true" disabled="disabled">---- Select Branches ----</option>
                                                <option disabled="disabled"> ---- METRO MANILA ---- </option>
                                                  <?php
                                                   
                                                    $mm1 = "Select * from sw_tbl_branches where branch_location ='" .  "MM1" . "'
";                    
                                                    $mm1 .= " order by branch_name";
                                                    $mm1_result = mysqli_query($conn, $mm1);
                                                    while($mm1_rows = mysqli_fetch_array($mm1_result)){
                                                    ?>
                                            
                                                     <option value="<?php echo $mm1_rows[1]; ?>"><?php echo $mm1_rows[2]?></option>    
                                                     <?php
                                                    }
                                                  ?>
                                                   <?php
                                                   
                                                    $mm2 = "Select * from sw_tbl_branches where branch_location ='" .  "MM2" . "'
";
                                                    $mm2 .= " order by branch_name";
                                                    $mm2_result = mysqli_query($conn, $mm2);
                                                    while($mm2_rows = mysqli_fetch_array($mm2_result)){
                                                    ?>
                                            
                                                     <option value="<?php echo $mm2_rows[1]; ?>"><?php echo $mm2_rows[2]?></option>    
                                                     <?php
                                                    }
                                                  ?>
                                                  <option disabled="disabled"> ---- NORTH LUZON ---- </option>
                                                         
                                                     <?php
                                                   
                                                    $north_query = "Select * from sw_tbl_branches where branch_location ='" .  "NORTH" . "'
";
                                                    $north_query .= " order by branch_name";
                                                    $north_result = mysqli_query($conn, $north_query);
                                                    while($north_rows = mysqli_fetch_array($north_result)){
                                                    ?>
                                            
                                                     <option value="<?php echo $north_rows[1]; ?>"><?php echo $north_rows[2]?></option>    
                                                     <?php
                                                    }
                                                  ?>    
                                                    <option disabled="disabled"> ---- SOUTH LUZON ---- </option>
                                                         
                                                     <?php
                                                   
                                                    $south_query = "Select * from sw_tbl_branches where branch_location ='" .  "SOUTH" . "'
";
                                                    $south_query .= " order by branch_name";
                                                    $south_result = mysqli_query($conn, $south_query);
                                                    while($south_rows = mysqli_fetch_array($south_result)){
                                                    ?>
                                            
                                                     <option value="<?php echo $south_rows[1]; ?>"><?php echo $south_rows[2]?></option>    
                                                     <?php
                                                    }
                                                  ?>   
                                                    <option disabled="disabled"> ---- VISMIN ---- </option>
                                                         
                                                     <?php
                                                   
                                                    $vismin_query = "Select * from sw_tbl_branches where branch_location ='" .  "VIZMIN" . "'
";
                                                    $south_query .= " order by branch_name";
                                                    $vismin_result = mysqli_query($conn, $vismin_query);
                                                    while($vismin_rows = mysqli_fetch_array($vismin_result)){
                                                    ?>
                                            
                                                     <option value="<?php echo $vismin_rows[1]; ?>"><?php echo $vismin_rows[2]?></option>    
                                                     <?php
                                                    }
                                                  ?>  
                                                  <option disabled="disabled"> ---- ONLINESHOP ---- </option>
                                                  <option value="ONLINE"> ONLINESHOP </option>
                                                  
                                              
                                             </select>
                                                        </div>
                                                        <div id="online_div"> </div>
                                                        <div id="duplicate_response" style="margin-left:13px;"> </div>
                                                        <div class="form-group col-md-9 col-sm-11 col-xs-11">
                                                        <label> Item Purchased (Product Code)</label>&nbsp;<label style="color:#e60000;"> * </label>  <a data-lightbox="example-1" href="https://i.imgur.com/N58e15N.png" class="btn btn-info btn-sm" style="margin-top:-10px;margin-left:50px;position:absolute;"><i class="fa fa-picture-o"></i> View Sample </a>
                                                        <input type="text" id="item_purchased" name="item_purchased" class="form-control" required="required" placeholder="C4860, C4859, X3751" tabindex="3" style="text-transform:uppercase;">
                                                        <span id="item_e"> </span>
                                                        </div>
                                                       
                                                         <div class="form-group col-md-9 col-sm-11 col-xs-11">
                                                        <label> Customer Name </label>&nbsp;<label style="color:#e60000;"> * </label>
                                                        <input type="text" id="full_name" name="full_name" style="text-transform:uppercase;" class="form-control" placeholder="ex . Dela Cruz, Juan" required="required" tabindex="4">
                                                        <span id="fname_e"> </span>
                                                        </div>
                                                         <div class="form-group col-md-9 col-sm-11 col-xs-11">
                                                        <label> Email </label>&nbsp;<label style="color:#e60000;"> * </label>
                                                        <input type="text" id="email" name="email" class="form-control" tabindex="5">
                                                        <span id="email_e"> </span>
                                                        </div>
                                                       
                                                         <div class="form-group col-md-9 col-sm-11 col-xs-11">
                                                        <label> Mobile Number </label>
                                                        <input type="text" id="phone_number" name="phone_number" tabindex="6" onkeypress="return isNumber(event)" class="form-control">
                                                        <span id="phone_e"> </span>
                                                      </div>
                                                       
                                                      </div>
                                                 
                                               </div>
                                                <script type="text/javascript" src="assets/jquery-2.2.3.min.js"> </script>
                                                <script>
                                                function online_show(){
                                                       if(document.getElementById("branches").value == "ONLINE"){
                                                             document.getElementById("online_div").innerHTML = '<div class="form-group col-md-9 col-sm-11 col-xs-11"><label> Online Store </label> <select class="form-control" id="online_store"> <option disabled="disabled" selected="selected"> ---- SELECT ONLINE STORE ---- </option><option value="LAZADA"> LAZADA </option><option value="ZALORA"> ZALORA </option> <option value="SHOPEE"> SHOPEE </option>  </select> </div>';
                                                       }else{
                                                           document.getElementById("online_div").innerHTML = "";
                                                       }
                                                }
                                                
                                              /**
                                                 function filtering(){
                                                    var invoice = $('#invoice_number').val();
                                                    var branches = $('#branches').val();
                                                    $.ajax({
                                                        type:"POST",
                                                        url:"validation_query.php",
                                                        data:{invoice_number:invoice, branches:branches},
                                                        success:function(result){
                                                            $('#duplicate_response').html(result);
                                                        }

                                                    });
                                                }  **/
                                               
                                                $(document).keypress(function(e) {
                                                    if(e.which == 13) {
                                                           var index = $('.form-control').index(document.activeElement) + 1;
                                                           $('.form-control').eq(index).focus();
        
                                                   }
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
                                               
                                                <div id="response" style="margin-left:13px;">
                                               
                                   </div>
                                            
                             </div>
                        
       <style type="text/css">
            .btnBlack{
            margin-left:15px;
            width:148%;background-color:#000;color:#fff;
            padding:15px 30px;
            display:inline-block;
            border:none;
            transition:all .2s;
           }
           .btnBlack:hover{
               background-color:#8c8c8c;
               color:#000;
            }
        </style>
                                 <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-6"> 
                                                <button type="button" id="btn_click" tabindex="7" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing.." name="btn_submit"  class="btnBlack"><i class="fa fa-paper-plane"></i> Submit </button>

                                                    <script type="text/javascript" src="assets/jquery-2.2.3.min.js"> </script>
                                                    <script type="text/javascript"> 

                                                      function on_change_function(){
                                                        
                                                         var invoice_number = $('#invoice_number').val();
                                                         var branches = $('#branches').val();
                                                           $.ajax({
                                                               type:"POST",
                                                               url:"validation_query.php",
                                                               data:{invoice_number:invoice_number, branches:branches},
                                                               success:function(result){
                                                                    $('#response').html(result);
                                                               }
                                                           });
                                                         }                                                      
                                                      
                                                       $('#btn_click').click(function(){
                                                    

                                                });

                                                    </script>
                                                    
                                             </div>
                            </div>    
                            </div> <!-- Panel Body --> 
                    </div> <!-- Panel Default -->
                </div>

  
                  <script src="assets/scss/Dashboard/dist/js/lightbox-plus-jquery.min.js"> </script>
                  <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
                  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>


                    </form>

 <script src="assets/jquery-2.2.3.min.js"> </script> 
                                    <script>
                                         $('#btn_click').click(function(){
                                              var user_name = $('#username').val();
                                              var password = $('#password').val();
                                              var $this = $(this);
                                              $this.button('loading');
                                              setTimeout(function(){

                                                         

                                                            var invoice_number = $('#invoice_number').val();
                                                            var full_name = $('#full_name').val();
                                                            var email = $('#email').val();
                                                            var item_purchased = $('#item_purchased').val();
                                                            var phone_number = $('#phone_number').val();
                                                            var branches = $('#branches').val();
                                                            var online_store = $('#online_store').val();
                                                           
                                                             if(document.getElementById("invoice_number").value == "" && document.getElementById("full_name").value == "" && document.getElementById("email_e").value == "" && document.getElementById("item_e").value == "" && document.getElementById("phone_number").value == ""){
                                                               document.getElementById("invoice_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";
                                                                 document.getElementById("fname_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";
                                                                  document.getElementById("email_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";
                                                                   document.getElementById("item_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";
                                                                     document.getElementById("phone_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";

                                                               }else if(document.getElementById("invoice_number").value == ""){
                                                                document.getElementById("invoice_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";
                                                               }
                                                               else if(document.getElementById("full_name").value == ""){
                                                                    document.getElementById("fname_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";
                                                               }else if(document.getElementById("item_purchased").value == ""){
                                                                document.getElementById("item_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";
                                                            }else if(document.getElementById("email").value ==""){
                                                                document.getElementById("email_e").innerHTML = "<div class='alert alert-danger'><label> Notice !</label> Please fill up this field</div>";
}else{
                                                                

                                                             $.ajax({
                                                               type:"POST",
                                                                url:"separate_link_query.php",
                                                                data:{invoice_number:invoice_number, full_name:full_name, email:email, item_purchased:item_purchased, phone_number:phone_number, branches:branches, online_store:online_store},
                                                                success: function(result){
                                                                    $('#response').html(result);
                                                                    $('#duplicate_response').html("");
                                                                    $('#invoice_number').val("");
                                                                    $('#full_name').val("");
                                                                    $('#email').val("");
                                                                    $('#item_purchased').val("");
                                                                    $('#phone_number').val("");
                                                                    $('#branches').val("");
                                                                }
                                                            });
                                                        }

                                                 
                                                 $this.button('reset');
                                              }, 2000);
                                        });      
                                        </script>

    
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>

   
</body>
</html>