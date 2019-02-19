 <?php 
                        $user_query = "Select * from users  where username = '" . $_SESSION['username'] . "' and password = '" . $_SESSION['password'] . "'";
                        $user_result = mysqli_query($conn, $user_query);
                        if($user_rows = mysqli_fetch_array($user_result)){
                            ?>
                            <li><label> Welcome, </label><a href="#"><?php echo " ". $user_rows[1]; ?></a></li>
                        <?php
                        }
        ?>