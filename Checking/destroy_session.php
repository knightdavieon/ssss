<?php 
   session_start();
   session_destroy();
   echo '<script type="text/javascript"> window.location="login_page.php"; </script>';
?>