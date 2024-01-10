<?php include ('partials/menu.php'); ?> 
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        

        <?php 
                 if(isset($_SESSION['add']))//Checking whether the Session of Not
                 {
                  echo $_SESSION['add'];//Dispalying Session Message if Set
                  unset($_SESSION['add']);//Remove Session Message
                 }
           ?>

        <br/> <br/>
          <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>User Name:</td>
                    <td><input type="text" name="username" placeholder="Your User Name"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>
                
                <tr>
                    
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
         </form>
    </div>
</div>
<?php include ('partials/footer.php'); ?>

<?php
//process the value from form and save it in Database
//check Whether the submit button is clicked or not

if(isset($_POST['submit']))
{

    //Button Clicked
   // echo "Button Clicked";

   //Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    

    //To Avoid Empty Values
    if($username == "" || $full_name == "" || $password == "" )
    {
       // if is True run   if($res==TRUE) else part
    }
    else
    {
        
    //Password Encryption with md5
    $password = md5($_POST['password']);

    //SQL query to Save the data into database
    $sql = "INSERT INTO tbl_admin SET 
        full_name = '$full_name',
        username = '$username',
        password = '$password'
     ";
    
     //3. Executing Query and Saving Data into Database
     $res = mysqli_query($conn, $sql) or die(mysqli_error());
    }
     //4.  Check Whether the(Query is Executed) data is inserted or not and display approprite message
     if($res==TRUE)
     {

        //Data Insert Data
        //echo "Data Inserted";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='success1'>Admin Added Successfully</div>";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
     }
     else
     {
        //Failed to Insert Data
        //echo "Data Not Inserted";
        $_SESSION['add'] = "<div class='error1'>Failed to Add Admin</div>";
        //Redirect page to Add Admin
        header("location:".SITEURL.'admin/manage-admin.php');
     }
  
}
?>