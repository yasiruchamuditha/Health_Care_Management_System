<?php
require_once('M_Connection.php');

// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';
$Names = '';

if (isset($_POST["btnSubmit"])) {
    $Email = $_POST["txtUserEmail"];
    $Medical_No = $_POST["txtMedicalNo"];
    $Specialization = $_POST["txtSpecialization"];
    $GraduateYears = $_POST["txtGYears"];
    $ExprienceYears = $_POST["txtEYears"];
    $Workplace = $_POST["txtWorkplace"];
    $WorkAddress = $_POST["txtWorkAddress"];
    

    // Perform SQL to find if this email is registered in the website
    $sql1 = "SELECT * FROM Doctor_Registration WHERE Email='$Email' ";
    $result = mysqli_query($con, $sql1);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['Email'] == $Email) {
            $alertMessage = "Already Registred in the System !";
            $redirectLocation = "D_Doctor_Panel.php";
        }
    } else {
             $sql2 = "SELECT * FROM user_Registration WHERE Email='$Email' ";
             $ret1 = mysqli_query($con, $sql2);
             $row1=mysqli_fetch_assoc($ret1);
             $Names = $row1['Name'];
            // Perform SQL
            $sql3 = "INSERT INTO Doctor_Registration (Name,Email, Medical_No, Specialization, GraduateYears, ExprienceYears, Workplace,WorkAddress)
                 VALUES('$Names','$Email', '$Medical_No', $Specialization, '$GraduateYears', '$ExprienceYears', '$Workplace', '$WorkAddress')";

            $ret2 = mysqli_query($con, $sql3);
            if ($ret2 > 0) {
                $alertMessage = "Registration successful!";
                $redirectLocation = "D_Doctor_Panel.php";
            } else {
                $alertMessage = "Please Try Again Shortly....";
                $redirectLocation = "D_Doctor_Panel.php";
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
    <title>PR CARE-Doctor Registration</title>
    <!-- Template Main CSS File -->
    <link href="css/A_User_Reg.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
    <?php require('D_Navigation_Bar.php'); ?>
    <div class="container-fluid" id="containerm">
        <!-- Form start -->
        <div class="container mt-3">
        <h1>Professional Registration</h1>
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
                <label  class="form-label mb-2">UserEmail:</label>
                <input type="email" class="form-control" name="txtUserEmail" placeholder="Enter Your Medical License Number" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Medical License Number:</label>
                <input type="text" class="form-control" name="txtMedicalNo" placeholder="Enter Your Medical License Number" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label class="form-label mb-2">Specialization:</label>
                <input type="text" class="form-control" name="txtSpecialization" placeholder="Enter Your Specialization" required >
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Year of Graduation:</label>
                <input type="text" class="form-control" name="txtGYears" placeholder="Enter Your Year of Graduation" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Total Years of Experience:</label>
                <input type="text" class="form-control" name="txtEYears" placeholder="Enter Your Total Years of Experience" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Current Workplace/Hospital:</label>
                <input type="text" class="form-control" name="txtWorkplace" placeholder="Enter Your Current Workplace/Hospital" required>
            </div>
          
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Work Address:</label>
                <input type="text" class="form-control" name="txtWorkAddress" placeholder="Enter Your Work Address" required>
            </div>
                <!--Button-->
                <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit">Submit Details</button>
            </form>
        </div>
    </div>
    <?php require('D_Footer.php'); ?>
</body>
</html>
