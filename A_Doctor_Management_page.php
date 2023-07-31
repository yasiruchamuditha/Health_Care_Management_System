<?php
require_once('M_Connection.php');

// Initialize the status message variable
$statusMessage = '';

if (isset($_POST['btnDelete'])) {
    $deleteid = $_POST['deleteid'];
    $sql = "DELETE FROM Doctor_Registration WHERE Email=?";
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
    <?php require('A_Navigation_Bar.php'); ?>
    <div class="container" style="margin-top: 100px;">
        <h1>Admin Panel - Doctor Profile Management</h1>
        <p class="header">Doctor Profiles [Doctor Profiles, Dentist Profiles]</p>
        <table class="table">
            <thead>
                <tr class="table-info">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Medical_No</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Workplace</th>
                    <th scope="col">ExprienceYears</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Doctor_Registration";
                $ret = mysqli_query($con, $sql);
                if ($ret) {
                    while ($row = mysqli_fetch_assoc($ret)) {
                        $Name = htmlspecialchars($row['Name']);
                        $Email = htmlspecialchars($row['Email']);
                        $Medical_No = htmlspecialchars($row['Medical_No']);
                        $Specialization = htmlspecialchars($row['Specialization']);
                        $Workplace = htmlspecialchars($row['Workplace']);
                        $ExprienceYears = htmlspecialchars($row['ExprienceYears']);

                        echo '<tr>
                            <th scope="row">' . $Name . '</th>
                            <td>' . $Email . '</td>
                            <td>' . $Medical_No . '</td>
                            <td>' . $Specialization . '</td>
                            <td>' . $Workplace . '</td>
                            <td>' . $ExprienceYears . '</td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="deleteid" value="' . $Email . '">
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
