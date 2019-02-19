
   <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="backend_page.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="View_registered_persons_ecleaning.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Registered Customers</span></a>
                    </li>
                    <?php 
                        $user_query = "Select * from users where username = '" . $_SESSION['username'] . "' and password = '" . $_SESSION['password'] . "'";
                        $user_result = mysqli_query($conn, $user_query);
                        if($user_rows = mysqli_fetch_array($user_result)){
                             if($user_rows[5] == "ADMINISTRATOR"){

                     ?> 
                    <li>
                        <a href="Edit_Page_ecleaning.php" class="waves-effect"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Edit Data</span></a>
                    </li>
                    <li>
                        <a href="add_new_branch_ecleaning.php" class="waves-effect"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Add New Branch</span></a>
                    </li>
                     <?php
                         }
                        }
                    ?>
                          
                    <li>

                        <a href="#" class="waves-effect"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Reports</span></a>
                    </li>
                    <li><a href="downloads.php"><i class="glyphicon glyphicon-download-alt"></i> &nbsp;&nbsp; Downloads </a></li>
                    <?php 
                        $user_query = "Select * from users where username = '" . $_SESSION['username'] . "' and password = '" . $_SESSION['password'] . "'";
                        $user_result = mysqli_query($conn, $user_query);
                        if($user_rows = mysqli_fetch_array($user_result)){
                             if($user_rows[5] == "ADMINISTRATOR"){

                     ?> 
 <li>
                        <a href="account_ecleaning.php" class="waves-effect"><i class="fa fa-key fa-fw" aria-hidden="true"></i><span class="hide-menu">Account</span></a>
                    </li>
                   

                        <?php
                         }
                        }
                    ?>
                                    
                 
                </ul>
                
            </div>
        </div>
        <!-- Left navbar-header end -->