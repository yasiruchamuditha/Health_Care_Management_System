<?php
require_once('M_Connection.php');
session_start();
// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';

if (isset($_SESSION["Email"])) {
    if (isset($_POST["btnSubmit"])) {
        $Patient_NIC = $_POST["txtPatient_NIC"];
        $Email = $_POST["txtEmail"];
        $Appointment_Date = $_POST["txtAppointment_Date"];
        $Appointment_Time = $_POST["txtAppointment_Time"];
        $Test_Type = $_POST["Test_Type"];

        // Perform SQL to find if this NIC already has an appointment for the same test type
        $sql1 = "SELECT * FROM Regular_Checkup WHERE Patient_NIC='$Patient_NIC' AND Test_Type='$Test_Type'";
        $result = mysqli_query($con, $sql1);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['Email'] == $Email) {
                $alertMessage = "Already Registered for the Appointment!";
                $redirectLocation = "index.php";
            }
        } else {
            $sql2 = "INSERT INTO Regular_Checkup (Patient_NIC, Email, Appointment_Date, Appointment_Time, Test_Type)
                     VALUES('$Patient_NIC', '$Email', '$Appointment_Date', '$Appointment_Time', '$Test_Type')";

            $ret2 = mysqli_query($con, $sql2);
            if ($ret2) {
                $alertMessage = "Registration successful!";
                $redirectLocation = "index.php";
            } else {
                $alertMessage = "Please Try Again Shortly....";
                $redirectLocation = "index.php";
            }
            // Disconnect 
            mysqli_close($con);
        }
    }
} else {
    $alertMessage = "Please LogIn First Before Making an Appointment";
    $redirectLocation = "M_User_Login.php";
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
    <?php require('P_Navigation_Bar.php'); ?>
    <div class="container-fluid" id="containerm">
        <div class="container mt-3">
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
            <?php if (isset($_SESSION["Email"])): ?>
                <h1>Regular Checkup - Appointment</h1>
                <form class="row g-3 needs-validation" name="frmBloodTest" method="post" autocomplete="off"
                    action="#">
                    <div class="inputfeild mb-3">
                        <label for="patient_id" class="form-label">Patient NIC:</label>
                        <input type="text" id="patient_id" name="txtPatient_NIC" class="form-control" placeholder="Please Enter Your NIC:" required>
                    </div>

                    <div class="inputfeild mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="txtEmail" class="form-control" placeholder="Please Enter Your Email:" required>
                    </div>

                    <div class="inputfeild mb-3">
                        <label for="appointment_date" class="form-label">Preferred Test Date:</label>
                        <input type="date" id="appointment_date" name="txtAppointment_Date" class="form-control" placeholder="Please Enter Your Preferred Test Date:" required>
                    </div>

                    <div class="inputfeild mb-3">
                        <label for="appointment_time" class="form-label">Preferred Test Time:</label>
                        <input type="time" id="appointment_time" name="txtAppointment_Time" class="form-control" placeholder="Please Enter Your Preferred Test Time:" required>
                    </div>

                    <div class="inputfeild mb-3">
                        <label for="doctor" class="form-label">Regular checkup Type:</label>
                        <select id="doctor" name="Test_Type" class="form-select" required>
                            <option value="" disabled selected>Select a Type</option>
                            <option value="APE">Annual Physical Examination</option>
                            <option value="BPC">Blood Pressure Check</option>
                            <option value="BMI">Body Mass Index (BMI) Measurement</option>
                            <option value="VT">Vaccinations</option>
                            <option value="SCT">Skin Check Tests</option>
                            <option value="EET">Eye Examination Tests</option>
                            <option value="BDT">Bone Density Test (for Seniors)</option>
                            <option value="ECG">Electrocardiogram (ECG or EKG)</option>
                        </select>
                    </div>
                    <div class="inputfeild">
                        <!--Button-->
                        <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit">Submit Details</button>
                    </div>
                </form>
            <?php else: ?>
                <div class="alert alert-danger">
                    Please Log In First Before Making a Regular Check Up Appointment
                </div>
                <a href="M_User_Login.php" class="btn btn-outline-danger" id="out">Log In</a>
            <?php endif; ?>
        </div>
    </div>
    <?php require('P_Footer.php'); ?>
</body>
</html>
