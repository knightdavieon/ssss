<?php session_start(); ?>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i> </a>
                <div class="top-left-part"><a class="logo"  href="index.html"><b><img src="icon/SW Logo.png" width="70" height="60" alt="home" /></b><span class="hidden-xs"></span> Silverworks</a> </div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="destroy_session.php" style="color:#fff;">  Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php 
            if(!isset($_SESSION['checking'])){
                echo '<script type="text/javascript"> window.location="login_page.php"; </script>';
                unset($_SESSION['checking ']);
            }
        ?>