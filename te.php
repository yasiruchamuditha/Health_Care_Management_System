<?php require_once('M_Connection.php');


if (isset($_POST["btnSubmit"])) {
    $Name = $_POST["txtName"];
    $Email = $_POST["txtUSerEmail"];
    $NIC = $_POST["txtNIC"];
    $Contact_No = $_POST["txtTelephoneNo"];
    $User_Role = $_POST["User_Role"];
    $Gender = $_POST["gender"];
    $Password = $_POST["txtPassword"];
    $Confirm_Password = $_POST["txtConfirm_Password"];
    $Verification = "NotVerified";

    // Use prepared statements to avoid SQL injection
    $sql = "SELECT * FROM user_registration WHERE Email=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($row['Email'] == $Email) {
        echo '<script>alert("Username is Taken. ")</script>';
    } else {
        if ($Password == $Confirm_Password) {
            // Hash the password for secure storage
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

            // Use prepared statements for INSERT query
            $sql = "INSERT INTO user_registration (Name, Email, NIC, Contact_No, User_Role, Gender, Password, Verification)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss", $Name, $Email, $NIC, $Contact_No, $User_Role, $Gender, $hashedPassword, $Verification);
            $ret = mysqli_stmt_execute($stmt);

            if ($ret > 0) {
                echo "<script>alert('Login successful!');</script>";
                // Redirect after successful sign up
                header('location:M_User_Login.php');
                exit;
            } else {
                echo '<script>alert("Please Try Again Shortly....")</script>';
                // Redirect after unsuccessful sign up
                header('location:index.php');
                exit;
            }

            // Disconnect after use
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Passwords do not match. Please try again');</script>";
            header('location:test.php');
            exit;
        }
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PR CARE- User Registration</title>
<!-- Template Main CSS File -->
<link href="css/M_User_Registration.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
  <div class="container-fluid" id="containerm">
  <!-- Form start -->
  <div class="container mt-3">
        <h1>User Registration</h1>
        <form class="row g-3 needs-validation" name="frmUserRegistration" method="post" autocomplete="off">
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Name:</label>
                <input type="text" class="form-control" name="txtName" placeholder="Enter Your First Name" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label class="form-label mb-2">UserEmail:</label>
                <input type="email" class="form-control" name="txtUSerEmail" placeholder="Enter Your UserEmail" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label class="form-label mb-2">NIC:</label>
                <input type="text" class="form-control" name="txtNIC" placeholder="Enter Your NIC" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Telephone No:</label>
                <input type="text" class="form-control" name="txtTelephoneNo" placeholder="Enter Your Telephone No" required>
            </div>
            <div class="inputfeild mt-3" >
           <label for="UserRole" class="form-label mb-2">I am ..</label>
             <select id="UserRole" name="User_Role"  class="role form-control" style="height: 50px;" required>
               <option selected disabled value="">Choose..</option>
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
                <input type="password" class="form-control" name="txtPassword" placeholder="Enter Password" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Confirm Password:</label>
                <input type="password" class="form-control" name="txtConfirm_Password" placeholder="Please Confirm Password" required>
            </div>
        <!--Button-->
        <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit" >Submit Details</button>
    </form>
 </div>
</div>
<?php require('P_Footer.php');?>
</body>
</html>
