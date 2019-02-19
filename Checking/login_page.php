<?php session_start();?>
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
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
hr {
  -moz-border-bottom-colors: none;
  -moz-border-image: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: #EEEEEE -moz-use-text-color #FFFFFF;
  border-style: solid none;
  border-width: 1px 0;
  margin: 18px 0;
}
.vl {
    border-left: 1px solid gray;
    height: 336px;
    position: absolute;
    left: 48%;
    margin-left: -3px;
    top: 0;
}
.jumbotron{
    background-color: rgba(0, 0, 0, 0.5);
    border-radius:10px;

}
label{
    color:rgba(255, 255, 255, 0.6);
}
h3 {
   color:rgba(255, 255, 255, 0.6);

}

</style>
</head>

<body style="background-image:url('icon\\wallpaper.jpg');background-repeat: no-repeat;background-size:100%;">
    <div class="col-md-offset-3 col-sm-10 col-xs-10" style="margin-top:80px;">
        <div class="col-md-8">
          <div class="jumbotron" >
             <div class="row">
              <div class="col-md-10 col-sm-10 col-xs-10" style="opacity:1;">
               <h3><i class="glyphicon glyphicon-user"></i> User Login</h3>
               </div>
              <div class="col-md-5 col-sm-5 col-xs-5" style="margin-left:2px;">
                   <label> Username </label>
                  <input type="text" id="username" value="user" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-10 col-sm-10 col-xs-10"></div>
                <div class="col-md-5 col-sm-5 col-xs-5" style="margin-left:2px;margin-top:10px;">
                   <label> Password</label>
                  <input type="password" id="password" value="user" class="form-control">
                </div>
                <div class="col-md-10 col-sm-10 col-xs-10"></div>
                <div class="col-md-offset-1 col-sm-10 col-xs-10" style="margin-top:20px;">
                <button type="button" class="btn btn-primary" id="btn_login" style="width:30%;"><i class="glyphicon glyphicon-ok-circle"></i> Sign-In</button>
                </div>
                <div class="vl"></div>
                <div class="col-md-offset-6 col-sm-offset-6 col-xs-offset-6" >
                      <a href="#" class="btn btn-warning" style="width:86%;height:100%;"><i class="glyphicon glyphicon-list-alt"></i> E-Cleaning Page </a>
                 </div>
               </div>

          <script src="jquery/jquery-2.2.3.min.js"></script>
          <script>
            $('#btn_login').click(function(){
                 var username = $('#username').val();
                 var password = $('#password').val();
                $.ajax({
                  type:"POST",
                  url:"login_query.php",
                  data:{username:username, password:password},
                  success:function(result){
                    if(result == "true"){
                       $('#username').val("");
                       $('#password').val("");
                       window.location = "backend_page.php";
                      alert("Redirecting to you account");
                    }else{
                      alert("Invalid Credentials, Please make sure your username and password correct");
                    }
                  }
                });
            });
            </script>
             </div>
        </div>
      </div>
   
</body>

</html>
