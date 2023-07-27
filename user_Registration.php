<?php require_once('connection.php');
if(isset($_POST["btnSubmit"]))
{
    $Name=$_POST["txtName"];
    $Email=$_POST["txtUSerEmail"];
    $Contact_No=$_POST["txtTelephoneNo"];
    $User_Role=$_POST["User_Role"];
    $Password=$_POST["txtPassword"];
    $Confirm_Password=$_POST["txtConfirm_Password"]; 
    $Verification="NotVerified";

    //perform sql to find this email is registered in website
    $sql = "SELECT * FROM user_registration WHERE Email='$Email' ";
    $result= mysqli_query($con, $sql);
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if($row['Email'] == $Email)
    {  
        echo '<script>alert("Username is Taken. ")</script>';
    }
    else
    {
        if($Password==$Confirm_Password)
        {
        //perform sql
         $sql = "INSERT INTO user_registration (Name,Email,Contact_No,User_Role,Password,Verification)
                 VALUES('$Name','$Email',$Contact_No,'$User_Role','$Password','$Verification')";

         $ret= mysqli_query($con, $sql);
         if ($ret > 0)
         {
          echo "<script>alert('Login successful!');</script>";
          //location after sign up
          header('location:user_Login.php');
         }
         else
         {
            echo '<script>alert("Please Try Again Shortly....")</script>';
            //location after sign up
            header('location:user_Registration.php');
         }
        //disconnect 
         mysqli_close($con);
        } 
        else
        {
          echo "<script>alert('Invalid username or password. Please try again');</script>";
          header('location:user_Registration.php');
        }
    }
}    
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Login</title>
   <!-- Template Main CSS File -->
   <link href="css/forms.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('navigationBarForms.php');?>
  <div class="container-fluid" id="containerm"  style="margin-top :150px ;margin-bottom :80px; max-width:600px;">
  <!-- Form start -->
  <div class="container mt-5">
        <h3>User Registration</h3>
        <form class="row g-3 needs-validation" name="frmUserRegistration" method="post" autocomplete="off" action="#">
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Name:</label>
                <input type="text" class="form-control" name="txtName" placeholder="Enter Your First Name" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label class="form-label mb-2">UserEmail:</label>
                <input type="email" class="form-control" name="txtUSerEmail" placeholder="Enter Your UserEmail" required >
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Telephone No:</label>
                <input type="text" class="form-control" name="txtTelephoneNo" placeholder="Enter Your Telephone No" required>
            </div>
            <div class="inputfeild mt-3" >
           <label for="UserRole" class="form-label mb-2">I am ..</label>
             <select id="UserRole" name="User_Role"  class="role form-control" style="height: 50px;" >
               <option selected value="S">Choose..</option>
               <option value="Doctor">Doctor</option>
               <option value="Patient">Patient</option>
               <option value="Admin">Admin</option>
             </select>
          </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Password:</label>
                <input type="text" class="form-control" name="txtPassword" placeholder="Enter Password" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Confirm Password:</label>
                <input type="text" class="form-control" name="txtConfirm_Password" placeholder="Please Confirm Password" required>
            </div>
        <!--Button-->
        <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit" >Submit Details</button>
    </form>
 </div>
</div>
<?php require('footer.php');?>
</body>
</html>
