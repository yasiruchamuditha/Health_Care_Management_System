<?php
require_once('M_Connection.php');
session_start();
// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';
$NIC = '';
$Names = '';

if (isset($_POST["btnSubmit"])) 
{
    $NIC = $_SESSION['NIC'];
    $DOB = $_POST["txtDOB"];
    $Address = $_POST["txtAddress"];
    $BloodGroup = $_POST["BloodGroup"];
    $MedicalConditions = $_POST["txtMedicalConditions"];
    $Allergies = $_POST["txtAllergies"];
   
    // Perform SQL to find if this email is registered in the website
    $sql1 = "SELECT * FROM Patient_Registration WHERE NIC='$NIC' ";
    $ret1 = mysqli_query($con, $sql1);
    $num_row1 = mysqli_num_rows($ret1);
    if ($num_row1 > 0) 
    {
        $row1 = mysqli_fetch_array($ret1);
        if ($row1['NIC'] == $NIC) 
        {
            $alertMessage = "Already Registred in the System !";
            $redirectLocation = "M_User_Login.php";
        }
    } 
    else 
    {
        $sql2 = "SELECT * FROM user_Registration WHERE NIC='$NIC' ";
        $ret2 = mysqli_query($con, $sql2);
        $row2=mysqli_fetch_assoc($ret2);
        $Names = $row2['Name'];
        // Perform SQL
        $sql3 = "INSERT INTO Patient_Registration (Name,NIC, DOB, Address, BloodGroup, MedicalConditions, Allergies)
                 VALUES('$Names','$NIC', '$DOB', '$Address', '$BloodGroup', '$MedicalConditions', '$Allergies')";

        $ret3 = mysqli_query($con, $sql3);
        if ($ret3 > 0) 
        {
            $alertMessage = "Registration successful!";
            $redirectLocation = "M_User_Login.php";
        } 
        else
        {
            $alertMessage = "Please Try Again Shortly....";
            $redirectLocation = "M_User_Login.php";
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
    <title>PR CARE-Patient Registration</title>
    <!-- Template Main CSS File -->
    <link href="css/A_User_Reg.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
    <div class="container-fluid" id="containerm">
        <!-- Form start -->
        <div class="container mt-3">
        <h1>Patient Registration</h1>
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
            <form class="row g-3 needs-validation" name="frmPatientRegistration" method="post" autocomplete="off"
                action="#">
                <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Date of Birth:</label>
                <input type="text" class="form-control" name="txtDOB" placeholder="Enter Your Date of Birth" required>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Address:</label>
                <input type="text" class="form-control" name="txtAddress" placeholder="Enter Your Home Address" required>
            </div>
          
            <div class="inputfeild mb-3">
                <label for="doctor" class="form-label">Blood Group:</label>
                <select id="BloodGroup" name="BloodGroup" class="form-select" required>
                    <option value="" disabled selected>Select Your Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="NOT_PREFERE">NOT PREFERE TO SAY</option>
                </select>
            </div>
            <label  class="form-label">Medical Conditions</label>
            <div class="form-floating">
                <textarea class="form-control"  id="txtMedicalConditions" name="txtMedicalConditions"></textarea>
                <label for="floatingTextarea2">Medical Conditions</label>
            </div>
            <label  class="form-label">Allergies (if any)</label>
            <div class="form-floating">
                <textarea class="form-control"  id="txtAllergies" name="txtAllergies"></textarea>
                <label for="floatingTextarea2">Allergies (if any)</label>
            </div>
                <!--Button-->
                <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit">Submit Details</button>
            </form>
        </div>
    </div>
    <?php require('P_Footer.php'); ?>
</body>
</html>
