<?php
require_once('M_Connection.php');

// Initialize the status message variable
$statusMessage = '';

if (isset($_POST['btnApprove'])) {
    $Patient_NIC = $_POST['Approveid'];
    $insertSql = "INSERT INTO approved_appoinment (Patient_NIC) VALUES (?)";
    $insertStmt = mysqli_prepare($con, $insertSql);
    mysqli_stmt_bind_param($insertStmt, "s", $Patient_NIC);
    $insertRet = mysqli_stmt_execute($insertStmt);

    if ($insertRet) {
        $statusMessage = '<div class="alert alert-success" role="alert">Successfully Approved</div>';
    } else {
        $statusMessage = '<div class="alert alert-danger" role="alert">Please Try Again Shortly...</div>';
    }
    mysqli_stmt_close($insertStmt);
}

if (isset($_POST['btnDelete'])) {
    $deleteid = $_POST['Deleteid'];
    $sql = "DELETE FROM doctor_appoinments WHERE Patient_NIC =?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $deleteid);
    $ret = mysqli_stmt_execute($stmt);

    if ($ret) {
        $statusMessage = '<div class="alert alert-success" role="alert">Successfully Deleted</div>';
    } else {
        $statusMessage = '<div class="alert alert-danger" role="alert">Please Try Again Shortly...</div>';
    }
    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PR CARE-Doctor Management</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation bar code is missing, add it here -->
    <?php require('D_Navigation_Bar.php'); ?>
    <div class="container" style="margin-top: 100px;margin-bottom:500px;">
        <h1>My Appointments</h1>
        <p class="header">Patients Appoinments</p>
        <table class="table">
            <thead>
                <tr class="table-info">
                    <th scope="col">Patient NIC</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Appointment_Date</th>
                    <th scope="col">Appointment_Time</th>
                    <th scope="col">Approve</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once('M_Connection.php');
                $Patient_Name ='';
                $sql = "SELECT * FROM doctor_appoinments";
                $ret = mysqli_query($con, $sql);
                if ($ret) {
                    while ($row = mysqli_fetch_assoc($ret)) {

                        $Patient_NIC  = htmlspecialchars($row['Patient_NIC']);
                        $Appointment_Date = htmlspecialchars($row['Appointment_Date']);

                        $sql1 = "SELECT Name FROM Patient_Registration WHERE NIC  = '$Patient_NIC'";
                        $result = mysqli_query($con, $sql1);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Patient_Name = htmlspecialchars($row['Name']);  
                            }
                            
                        }
                      
                        $Appointment_Time = ' ';
                        echo '<tr>
                            <th scope="row">' . $Patient_NIC . '</th> 
                            <td>' . $Patient_Name . '</td>
                            <td>' . $Appointment_Date . '</td>
                            <td>'. $Appointment_Time .'</td>
                                
                            <td>
                                <form method="post">
                                    <input type="hidden" name="Approveid" value="' . $Patient_NIC . '">
                                    <button type="submit" class="btn btn-danger" name="btnApprove">Click Here</button>
                                </form>
                            </td>
                            
                            <td>
                                <form method="post">
                                    <input type="hidden" name="Deleteid" value="' . $Patient_NIC . '">
                                    <button type="submit" class="btn btn-danger" name="btnDelete">Click Here</button>
                                </form>
                            </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Display the status message below the table -->
    <div class="container">
        <?php echo $statusMessage; ?>
    </div>

    <!-- The rest of your HTML code -->
    <?php require('D_Footer.php'); ?>
    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
</body>

</html>
