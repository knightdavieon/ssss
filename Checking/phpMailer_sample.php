
<!DOCTYPE html>
<html lang="en">
<head>
    <title>  </title>
 </head>
   <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
             <input type="text" id="email_address">
             <button type="button" id="btn_email"> Send Email </button>
             <script src="jquery/jquery-2.2.3.min.js"> </script>
             <script>
                   $('#btn_email').click(function(){
                        var email_address = $('#email_address').val();
                        $.ajax({
                             type:"POST",
                             url:"mailer_query.php",
                             data:{email_address:email_address},
                             success:function(result){
                             	 alert(result);
                             }
                        });
                   });
              </script>
         </form>
    </body>
</html>