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
        $App_Type = $_POST["App_Type"];

        // Perform SQL to find if this NIC already has an appointment for the same blood type
        $sql1 = "SELECT * FROM Physiotheraphy WHERE Patient_NIC='$Patient_NIC' AND App_Type='$App_Type'";
        $result = mysqli_query($con, $sql1);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['Email'] == $Email) {
                $alertMessage = "Already Registered for the Appointment!";
                $redirectLocation = "index.php";
            }
        } else {
            $sql2 = "INSERT INTO Physiotheraphy (Patient_NIC, Email, Appointment_Date, Appointment_Time, App_Type)
                     VALUES('$Patient_NIC', '$Email', '$Appointment_Date', '$Appointment_Time', '$App_Type')";

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
    <title>PR CARE - Physiotheraphy Appointment</title>
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
        <!-- Form start -->
        <?php if (isset($_SESSION["Email"])): ?>
        <div class="container mt-3">
            <h1>Physiotheraphy - Appointment</h1>
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
            <form class="row g-3 needs-validation" name="frmPhysiotheraphy" method="post" autocomplete="off"
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
                <label for="doctor" class="form-label">physiotherapy Type:</label>
                <select id="doctor" name="App_Type" class="form-select" required>
                    <option value="" disabled selected>Select a Type</option>
                    <option value="OP">Orthopedic Physiotherapy</option>
                    <option value="NP">Neurological Physiotherapy</option>
                    <option value="CPP">Cardiovascular and Pulmonary Physiotherapy</option>
                    <option value="PP">Pediatric Physiotherapy</option>
                    <option value="GP">Geriatric Physiotherapy</option>
                    <option value="SP">Sports Physiotherapy</option>
                    <option value="WHP">Women's Health Physiotherapy</option>
                    <option value="VRP">Vestibular Rehabilitation</option>
                    <option value="HTP">Hand Therapy</option>
                    <option value="AP">Aquatic Physiotherapy</option>
                    <option value="MTP">Manual Therapy</option>
                    <option value="PMP">Pain Management</option>
                </select>
            </div>
            <div class="inputfeild">
           <!--Button-->
           <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit" >Submit Details</button>
           </div>
        </form>
        </div>
        <?php else: ?>
        <div class="container mt-3" id="outputBox">
            <h1>Please Log In First Before Making a Physiotheraphy Appointment</h1>
            <a href="M_User_Login.php" class="btn btn-outline-danger" id="out">Log In</a>
        </div>
        <?php endif; ?>
    </div>
    <?php require('P_Footer.php');?>
</body>
</html>
