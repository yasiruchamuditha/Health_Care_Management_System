<?php require_once('M_Connection.php');
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

        // Perform SQL to find if this NIC already has an appointment for the same blood type
        $sql1 = "SELECT * FROM Blood_Test WHERE Patient_NIC='$Patient_NIC' AND Test_Type='$Test_Type'";
        $result = mysqli_query($con, $sql1);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['Email'] == $Email) {
                $alertMessage = "Already Registered for the Appointment!";
                $redirectLocation = "index.php";
            }
        } else {
            $sql2 = "INSERT INTO Blood_Test (Patient_NIC, Email, Appointment_Date, Appointment_Time, Test_Type)
                     VALUES('$Patient_NIC', '$Email', '$Appointment_Date', '$Appointment_Time', '$Test_Type')";

            $ret2 = mysqli_query($con, $sql2);
            if ($ret2 > 0) {
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
    <title>PR CARE - Blood Test</title>
    <!-- Template Main CSS File -->
    <link href="css/service_page.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
    <div class="container-fluid" id="containerm">
        <!-- Form start -->
        <?php if (isset($_SESSION["Email"])): ?>
        <div class="container mt-3">
            <h1>Blood Test - Appointment</h1>
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
            <form class="row g-3 needs-validation" name="frmBloodTest" method="post" autocomplete="off"
                action="#">
                <div class="inputfeild mb-3">
                <label for="patient_id" class="form-label">Patient NIC:</label>
                <input type="text" id="patient_id" name="txtPatient_NIC" class="form-control" placeholder="Please Enter Your NIC:" required>
            </div>

            <div class="inputfeild mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="txtEmail" class="form-control" placeholder="Please Enter Your Email:"  required>
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
                <label for="doctor" class="form-label">Test Type:</label>
                <select id="doctor" name="Test_Type" class="form-select" required>
                    <option value="" disabled selected>Select a Type</option>
                    <option value="CBC">Complete Blood Count</option>
                    <option value="LP">Lipid Profile</option>
                    <option value="BGTs">Blood Glucose Test</option>
                    <option value="LFTs">Liver Function Tests (LFTs)</option>
                    <option value="KFTs">Kidney Function Tests</option>
                    <option value="TFTs">Thyroid Function Tests</option>
                    <option value="IS">Iron Studies</option>
                    <option value="VDTs">Vitamin D Test</option>
                    <option value="BCTs">Blood Coagulation Tests (PT, INR)</option>
                    <option value="ABTs">Allergy Blood Tests</option>
                    <option value="RFTs">Rheumatoid Factor (RF) Test</option>
                    <option value="CPRTs">C-reactive Protein (CRP) Test</option>
                </select>
            </div>
            <div class="inputfeild">
           <!--Button-->
           <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit" >Submit Details</button>
           </div>
        </form>
        </div>
        <?php else: ?>
        <div class="container mt-3">
            <h1>Please Log In First Before Making an Appointment</h1>
            <a href="M_User_Login.php" class="btn btn-primary">Log In</a>
        </div>
        <?php endif; ?>
    </div>
    <?php require('P_Footer.php');?>
</body>
</html>
