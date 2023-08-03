<?php
require_once('M_Connection.php');

// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';
$Names = '';

if (isset($_POST["btnSubmit"])) {
    $Email = $_POST["txtUserEmail"];
    $Medical_No = $_POST["txtMedicalNo"];
    $Specialization = $_POST["Specialization"];
    $GraduateYears = $_POST["txtGYears"];
    $ExprienceYears = $_POST["txtEYears"];
    $Workplace = $_POST["txtWorkplace"];
    $WorkAddress = $_POST["txtWorkAddress"];
    
    // Perform SQL to find if this email is registered in the user
    $sql1 = "SELECT * FROM user_Registration WHERE Email='$Email' ";
    $ret1 = mysqli_query($con, $sql1);
    $num_row1 = mysqli_num_rows($ret1);
    if ($num_row1 > 0)
    {   
        $row1 = mysqli_fetch_array($ret1);
        if ($row1['Email'] == $Email) 
        {
            // Perform SQL to find if this email is registered in the website
            $sql2 = "SELECT * FROM Doctor_Registration WHERE Email='$Email' ";
            $ret2 = mysqli_query($con, $sql2);
            $num_row2 = mysqli_num_rows($ret2);
            if ($num_row2 > 0) 
             {
               $row2 = mysqli_fetch_array($ret2);
                  if ($row2['Email'] == $Email) 
                  {
                   $alertMessage = "Already Registred in the System !";
                   $redirectLocation = "D_Doctor_Panel.php";
                  }
             } 
             else 
             {
             $sql3 = "SELECT * FROM user_Registration WHERE Email='$Email' ";
             $ret3 = mysqli_query($con, $sql3);
             $row3=mysqli_fetch_assoc($ret3);
             $Names = $row3['Name'];
            // Perform SQL
            $sql4 = "INSERT INTO Doctor_Registration (Name,Email, Medical_No, Specialization, GraduateYears, ExprienceYears, Workplace,WorkAddress)
                 VALUES('$Names','$Email', '$Medical_No', '$Specialization', '$GraduateYears', '$ExprienceYears', '$Workplace', '$WorkAddress')";

            $ret4 = mysqli_query($con, $sql4);
            if ($ret4 > 0) {
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
       
    }
    else
    {
        $alertMessage = "Your are Not Registred in the System !";
        $redirectLocation = "D_Doctor_Panel.php";
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
          
            <div class="inputfeild mb-3">
                <label for="doctor" class="form-label">Specialization:</label>
                <select id="doctor" name="Specialization" class="form-select" required>
                    <option value="" disabled selected>Select Your Specialization</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Oncology">Oncology</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Gastroenterology">Gastroenterology</option>
                    <option value="Pulmonology">Pulmonology</option>
                    <option value="Endocrinology">Endocrinology</option>
                    <option value="Nephrology">Nephrology</option>
                    <option value="Infectious_Disease">Infectious Disease</option>
                    <option value="Obstetrics">Obstetrics</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="Psychiatry">Psychiatry</option>
                    <option value="Gynecology">Gynecology</option>
                    <option value="Emergency_Care">Emergency Care</option>
                    <option value="Dentists">Dentists</option>
                </select>
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
