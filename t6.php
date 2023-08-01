<?php
require_once('M_Connection.php');
session_start();

// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';

if (isset($_POST["btnSubmit"])) 
{
    $Name = $_POST["txtName"];
    $Email = $_POST["txtUSerEmail"];
    $NIC = $_POST["txtNIC"];
    $Contact_No = $_POST["txtTelephoneNo"];
    $User_Role = $_POST["User_Role"];
    $Gender = $_POST["gender"];
    $Password = $_POST["txtPassword"];
    $Confirm_Password = $_POST["txtConfirm_Password"];
    $Verification = "NotVerified";

    //perform sql to find this email is registered in the website
    $sql1 = "SELECT * FROM user_registration WHERE NIC='$NIC' ";
    $ret1 = mysqli_query($con, $sql1);
    $num_row = mysqli_num_rows($ret1);
    if ($num_row > 0)
    {
       $row = mysqli_fetch_array($ret1);
       if($row['NIC'] == $NIC)
       {
           $alertMessage = "There are already accounts registered under this NIC.";
           $redirectLocation = "index.php";
       } 
    }   
    else 
    {
        if ($Password == $Confirm_Password) 
        {
            //perform SQL
            $sql2 = "INSERT INTO user_registration (Name, Email, NIC, Contact_No, User_Role, Gender, Password, Verification)
            VALUES('$Name', '$Email', '$NIC', $Contact_No, '$User_Role', '$Gender', '$Password', '$Verification')";

            $result2 = mysqli_query($con, $sql2);
            if ($result2 > 0)
            {
                $alertMessage = "Registration successful!";
                $redirectLocation = "M_User_Login.php";
            } 
            else 
            {
                $alertMessage = "Please Try Again Shortly....";
                $redirectLocation = "index.php";
            }
        } 
        else 
        {
            $alertMessage = "Invalid username or password. Please try again";
            $redirectLocation = "index.php";
        }

        // Disconnect 
        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PR CARE - Regular Checkup</title>
    <!-- Template Main CSS File -->
    <link href="css/P_Service_Page.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
    <div class="container-fluid" id="containerm">
        <div class="container mt-3">
        <h1>User Registration</h1>
            <?php if (!empty($alertMessage)) : ?>
                <div class="alert alert-<?php echo ($redirectLocation === 'index.php' ? 'success' : 'danger'); ?>">
                    <?php echo $alertMessage; ?>
                </div>
                <?php if ($redirectLocation === 'index.php'): ?>
                    <script>
                        // Redirect after displaying the message
                        setTimeout(function () {
                            window.location.href = '<?php echo $redirectLocation; ?>';
                        }, 3000); // Redirect after 3 seconds (adjust as needed)
                    </script>
                <?php endif; ?>
            <?php endif; ?>
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
                <label class="form-label mb-2">NIC:</label>
                <input type="text" class="form-control" name="txtNIC" placeholder="Enter Your NIC" required >
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
          <div class="inputfeild mt-3">
              <label class="form-label mb-2">Gender:</label>
              <input type="radio" name="gender" value="Male" required> Male
              <input type="radio" name="gender" value="Female" required> Female
             <input type="radio" name="gender" value="Other" required> Other
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
    <?php require('P_Footer.php'); ?>
</body>
</html>