<?php
require_once('connection.php');

// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';

if (isset($_POST["btnSubmit"])) {
    $Name = $_POST["txtName"];
    $Email = $_POST["txtUSerEmail"];
    $Contact_No = $_POST["txtTelephoneNo"];
    $User_Role = $_POST["User_Role"];
    $Password = $_POST["txtPassword"];
    $Confirm_Password = $_POST["txtConfirm_Password"];
    $Verification = "NotVerified";

    // Perform SQL to find if this email is registered in the website
    $sql = "SELECT * FROM user_registration WHERE Email='$Email' ";
    $result = mysqli_query($con, $sql);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['Email'] == $Email) {
            $alertMessage = "Username is Taken.";
        }
    } else {
        if ($Password == $Confirm_Password) {
            // Perform SQL
            $sql = "INSERT INTO user_registration (Name, Email, Contact_No, User_Role, Password, Verification)
                 VALUES('$Name', '$Email', $Contact_No, '$User_Role', '$Password', '$Verification')";

            $ret = mysqli_query($con, $sql);
            if ($ret > 0) {
                $alertMessage = "Login successful!";
                $redirectLocation = "A_User_Account_Management_page.php";
            } else {
                $alertMessage = "Please Try Again Shortly....";
                $redirectLocation = "A_User_Account_Management_page.php";
            }
            // Disconnect 
            mysqli_close($con);
        } else {
            $alertMessage = "Invalid username or password. Please try again";
            $redirectLocation = "A_User_Account_Management_page.php";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - User Registration</title>
    <!-- Template Main CSS File -->
    <link href="css/User_Registration.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
    <?php require('A_Navigation_Bar.php'); ?>
    <div class="container-fluid" id="containerm">
        <!-- Form start -->
        <div class="container mt-3">
            <h1>Admin Panel - User Registration</h1>
            <?php if (!empty($alertMessage)) : ?>
                <div class="modal fade" id="outputModal" tabindex="-1" aria-labelledby="outputModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="outputModalLabel">Output Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php echo $alertMessage; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var modal = new bootstrap.Modal(document.getElementById('outputModal'));
                        modal.show();
                        // Redirect after displaying the message
                        var redirectLocation = '<?php echo $redirectLocation; ?>';
                        if (redirectLocation) {
                            setTimeout(function () {
                                window.location.href = redirectLocation;
                            }, 3000); // Redirect after 3 seconds (adjust as needed)
                        }
                    });
                </script>
            <?php endif; ?>
            <form class="row g-3 needs-validation" name="frmUserRegistration" method="post" autocomplete="off"
                action="#">
                <div class="inputfeild mt-3 ">
                    <label class="form-label mb-2">Name:</label>
                    <input type="text" class="form-control" name="txtName" placeholder="Enter Your First Name"
                        required>
                </div>
                <div class="inputfeild mt-3 ">
                    <label class="form-label mb-2">UserEmail:</label>
                    <input type="email" class="form-control" name="txtUSerEmail" placeholder="Enter Your UserEmail"
                        required>
                </div>
                <div class="inputfeild mt-3 ">
                    <label class="form-label mb-2">Telephone No:</label>
                    <input type="text" class="form-control" name="txtTelephoneNo"
                        placeholder="Enter Your Telephone No" required>
                </div>
                <div class="inputfeild mt-3">
                    <label for="UserRole" class="form-label mb-2">I am ..</label>
                    <select id="UserRole" name="User_Role" class="role form-control" style="height: 50px;">
                        <option selected value="S">Choose..</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Patient">Patient</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="inputfeild mt-3 ">
                    <label class="form-label mb-2">Password:</label>
                    <input type="text" class="form-control" name="txtPassword" placeholder="Enter Password" required>
                </div>
                <div class="inputfeild mt-3 ">
                    <label class="form-label mb-2">Confirm Password:</label>
                    <input type="text" class="form-control" name="txtConfirm_Password"
                        placeholder="Please Confirm Password" required>
                </div>
                <!--Button-->
                <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit"
                    name="btnSubmit">Submit Details</button>
            </form>
        </div>
    </div>
    <?php require('A_Footer.php'); ?>
</body>
</html>
