<?php include('menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])) //checking wheteher the session
            {
              echo $_SESSION['add']; //display the session message if set
              unset($_SESSION['add']);  //Remove session message
            }
        ?>

        <form action="" method="POST">

            <Table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="your username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>
            </Table>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>

<?php
    //process the value from form and save it in database
    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // button clicked
        //echo "Button clicked";
        //1.get the data from form
       $full_name= $_POST['full_name'];
       $username = $_POST['username'];
       $password = md5($_POST['password']); //password encryption with md5
       //2.SQL Query to save the data into database
       $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
       ";
       
       //3. excuting query and saving data into database

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. check whether the query is executed data is inserted or not and display appropriate message 
        if($res==TRUE)
        {

            //data inserted
           // echo "data inserted";
           //create a session variable to display message
           $_SESSION['add'] = "Admin added successfully";
           //redirect page
           header("location:".SITEURL.'manage-admin.php');
        }
        else
        {
            //failed to insert data
            //echo "fails to insert data";
             //create a session variable to display message
           $_SESSION['add'] = "fail to add admin";
           //redirect page
           header("location:".SITEURL.'add-admin.php');
        
        }
    }
    
?>
