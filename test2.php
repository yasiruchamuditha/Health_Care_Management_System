<?php
require_once('connection.php');

if (isset($_POST['btnDelete'])) {
    $deleteid = $_POST['deleteid'];
    $sql = "DELETE FROM user_registration WHERE Email=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $deleteid);
    $ret = mysqli_stmt_execute($stmt);

    if ($ret) {
        echo '<script>alert("Successfully Deleted")</script>';
    } else {
        echo '<script>alert("Please Try Again Shortly....")</script>';
    }
    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin Panel - User Account Management</title>
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
    <div class="container" style="margin-top: 100px;">
        <h1>Admin Panel - User Profile Management</h1>
        <p class="header">Add New User Profiles - <a href="A_User_Registration.php" class="btn btn-primary text-light">Click Here</a></p>
        <p class="header">PR User Profiles [Doctor Profiles, Patient Users Profiles, Admin Profiles]</p>
        <table class="table">
            <thead>
                <tr class="table-info">
                    <th scope="col">Name</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM user_registration";
                $ret = mysqli_query($con, $sql);
                if ($ret) {
                    while ($row = mysqli_fetch_assoc($ret)) {
                        $Name = htmlspecialchars($row['Name']);
                        $Contact_No = htmlspecialchars($row['Contact_No']);
                        $Email = htmlspecialchars($row['Email']);
                        $Password = htmlspecialchars($row['Password']);

                        echo '<tr>
                            <th scope="row">' . $Name . '</th>
                            <td>' . $Contact_No . '</td>
                            <td>' . $Email . '</td>
                            <td>' . $Password . '</td>
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
    <!-- Footer code is missing, add it here -->
    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
</body>

</html>
