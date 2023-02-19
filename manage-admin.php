<?php include('menu.php'); ?>

        <!-- Main content section starts --->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br/>

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //displaying session message
                        unset($_SESSION['add']); //receiving session message
                    }
                ?>
                <br><br><br>

                <!-- Button to add admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br/><br/><br/>
                
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //Query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the query
                        $res = mysqli_query($conn, $sql);

                        //check whether the query is executed of not
                        if($res==TRUE)
                        {
                            //count rows to check whether data in database 
                            $count = mysqli_num_rows($res); // function

                            $sn=1; //create a variable and assign the value

                            //check the num of rows
                            if($count>0)
                            {
                                //we have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //using while to get all the data from database
                                    //and while loop will run as long as data in database

                                    //get individaul data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //display the values in our table
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?> </td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="#" class="btn-secondary">Update Admin</a>
                                                <a href="#" class="btn-danger">Delete Admin</a>
                                            </td>
                                        </tr>
                                        <?php
                                }
                            }
                            else
                            {
                                //we do not have data in database
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
        <!-- Menu content section ends --->

<?php include('footer.php'); ?>
