<?php require_once("Connection_ecleaning.php"); ?>
<?php 
    if(isset($_GET['cat_opt']) && isset($_GET['cat_val'])){
           if($_GET['cat_opt'] == "invoice_number"){
            ?>
               <table id="tbl_invoice" class="table table-bordered table-striped">
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
                            $query = mysqli_query($conn, "Select * from sw_tbl_cleaning  where invoice = '" . stripslashes(trim($_GET['cat_val'])) . "'");
                            $count = mysqli_num_rows($query);
                            if($count > 0){
                                while($rows = mysqli_fetch_array($query)){
                                 ?>
                                    <tr>
                                        <td><?php echo $rows['invoice']; ?></td>
                                        <td><?php echo $rows['full_name']; ?></td>
                                        <td><?php echo $rows['email']; ?></td>
                                        <td><?php echo $rows['item']; ?></td>
                                        <td><?php echo $rows['status']; ?></td>
                                        <td><?php echo $rows['date_registration']; ?></td>
                                        <td><a href="Edit_Data_ecleaning.php?uid=<?php echo $rows['unique_id']; ?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a><button type="submit" onclick="return confirm('Confirm Removing of Data');" class="btn btn-danger" name="btn_delete" value="<?php echo $data_rows['unique_id']?>"><i class="fa fa-remove"></i></button>
                                        </td>
                                     </tr>
                                <?php
                                }     
                            }else{
                                  echo "No data found";
                            }
                         ?>
                      </tbody>
                </table>
            <?php
           }elseif($_GET['cat_opt'] == "email"){
              ?>
                 <table id="tbl_email" class="table table-bordered table-striped">
                       <thead>
                          <tr>
                           <th> Invoice </th>
                           <th> Name </th>
                           <th> Email </th>
                           <th> Item </th>
                           <th> Status </th>
                           <th> Registration Date </th>
                           <th> Options </th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                            $query = mysqli_query($conn, "Select * from sw_tbl_cleaning  where email = '" . stripslashes(trim($_GET['cat_val'])) . "'");
                            $count = mysqli_num_rows($query);
                            if($count > 0){
                                while($rows = mysqli_fetch_array($query)){
                                 ?>
                                    <tr>
                                        <td><?php echo $rows['invoice']; ?></td>
                                        <td><?php echo $rows['full_name']; ?></td>
                                        <td><?php echo $rows['email']; ?></td>
                                        <td><?php echo $rows['item']; ?></td>
                                        <td><?php echo $rows['status']; ?></td>
                                        <td><?php echo $rows['date_registration']; ?></td>
                                        <td><a href="Edit_Data_ecleaning.php?uid=<?php echo $rows['unique_id']; ?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a><button type="submit" onclick="return confirm('Confirm Removing of Data');" class="btn btn-danger" name="btn_delete" value="<?php echo $data_rows['unique_id']?>"><i class="fa fa-remove"></i></button>
                                        </td>
                                     </tr>
                                <?php
                                }     
                            }else{
                                  echo "No data found";
                            }
                         ?>
                      </tbody>
                </table>
            <?php
           }elseif($_GET['cat_opt'] == "customer_name"){
               ?>
                 <table id="tbl_name" class="table table-bordered table-striped">
                       <thead>
                          <tr>
                           <th> Invoice </th>
                           <th> Name </th>
                           <th> Email </th>
                           <th> Item </th>
                           <th> Status </th>
                           <th> Registration Date </th>
                           <th> Options </th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                            $query = mysqli_query($conn, "Select * from sw_tbl_cleaning  where full_name = '" . stripslashes($_GET['cat_val']) . "'");
                            $count = mysqli_num_rows($query);
                            if($count > 0){
                                while($rows = mysqli_fetch_array($query)){
                                 ?>
                                    <tr>
                                        <td><?php echo $rows['invoice']; ?></td>
                                        <td><?php echo $rows['full_name']; ?></td>
                                        <td><?php echo $rows['email']; ?></td>
                                        <td><?php echo $rows['item']; ?></td>
                                        <td><?php echo $rows['status']; ?></td>
                                        <td><?php echo $rows['date_registration']; ?></td>
                                        <td><a href="Edit_Data_ecleaning.php?uid=<?php echo $rows['unique_id']; ?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a><button type="submit" onclick="return confirm('Confirm Removing of Data');" class="btn btn-danger" name="btn_delete" value="<?php echo $data_rows['unique_id']?>"><i class="fa fa-remove"></i></button>
                                        </td>
                                     </tr>
                                <?php
                                }     
                            }else{
                                  echo "No data found";
                            }
                         ?>
                      </tbody>
                </table>
           <?php
           }elseif($_GET['cat_opt'] == "all_data"){
             ?>
             <table id="tbl_all" class="table table-bordered table-striped">
                       <thead>
                          <tr>
                           <th> Invoice </th>
                           <th> Name </th>
                           <th> Email </th>
                           <th> Item </th>
                           <th> Status </th>
                           <th> Registration Date </th>
                           <th> Options </th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                            $query = mysqli_query($conn, "Select * from sw_tbl_cleaning");
                            $count = mysqli_num_rows($query);
                            if($count > 0){
                                while($rows = mysqli_fetch_array($query)){
                                 ?>
                                    <tr>
                                        <td><?php echo $rows['invoice']; ?></td>
                                        <td><?php echo $rows['full_name']; ?></td>
                                        <td><?php echo $rows['email']; ?></td>
                                        <td><?php echo $rows['item']; ?></td>
                                        <td><?php echo $rows['status']; ?></td>
                                        <td><?php echo $rows['date_registration']; ?></td>
                                        <td><a href="Edit_Data_ecleaning.php?uid=<?php echo $rows['unique_id']; ?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a><button type="submit" onclick="return confirm('Confirm Removing of Data');" class="btn btn-danger" name="btn_delete" value="<?php echo $data_rows['unique_id']?>"><i class="fa fa-remove"></i></button>
                                        </td>
                                     </tr>
                                <?php
                                }     
                            }else{
                                  echo "No data found";
                            }
                         ?>
                      </tbody>
                </table>
             <?php
           }
    }
?>