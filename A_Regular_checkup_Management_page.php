<?php
require_once('M_Connection.php');

// Initialize the status message variable
$statusMessage = '';

if (isset($_POST['btnDelete'])) {
    $deleteid = $_POST['deleteid'];
    $sql = "DELETE FROM Regular_Checkup WHERE ID=?";
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
    <title>PR CARE- Regular CheckUp Managenment</title>
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
    <?php require('A_Navigation_Bar.php'); ?>
    <div class="container" style="margin-top: 100px;">
        <h1>Admin Panel - Regular CheckUp Managenment</h1>
        <p class="header">Regular CheckUp Appointment </p>
        <table class="table">
            <thead>
                <tr class="table-info">
                    <th scope="col">Appoinment ID</th>
                    <th scope="col">Patient_NIC</th>
                    <th scope="col">Email</th>
                    <th scope="col">Appointment_Date</th>
                    <th scope="col">Appointment_Time</th>
                    <th scope="col">Test_Type</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Regular_Checkup";
                $ret = mysqli_query($con, $sql);
                if ($ret) {
                    while ($row = mysqli_fetch_assoc($ret)) {
                        $ID = htmlspecialchars($row['ID']);
                        $Patient_NIC = htmlspecialchars($row['Patient_NIC']);
                        $Email = htmlspecialchars($row['Email']);
                        $Appointment_Date = htmlspecialchars($row['Appointment_Date']);
                        $Appointment_Time = htmlspecialchars($row['Appointment_Time']);
                        $Test_Type = htmlspecialchars($row['Test_Type']);

                        echo '<tr>
                            <th scope="row">' . $ID . '</th>
                            <td>' . $Patient_NIC . '</td>
                            <td>' . $Email . '</td>
                            <td>' . $Appointment_Date . '</td>
                            <td>' . $Appointment_Time . '</td>
                            <td>' . $Test_Type . '</td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="deleteid" value="' . $ID . '">
                                    <button type="submit" class="btn btn-danger" name="btnDelete">Delete</button>
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
    <?php require('A_Footer.php'); ?>
    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
</body>

</html>
