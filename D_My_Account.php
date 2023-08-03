<?php
require_once('M_Connection.php');

session_start();
$Email = $_SESSION['Email'];

// Sample query to retrieve user details
$sql = "SELECT * FROM user_registration WHERE Email = '$Email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "<p class='text-danger'>No user Details found!</p>";
}


$sql = "SELECT * FROM doctor_registration WHERE Email = '$Email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $doctor = $result->fetch_assoc();
} else {
    echo "<p class='text-danger'>No Professional Details found!</p>";
}


$con->close();
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PR CARE- My Account</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url(img/home.jpg); /* Replace with your background image URL */
        }

        #containerx {
            padding-top: 30px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .card-body {
            font-size: 18px;
        }

        .card-footer {
            background-color: #f8f9fa;
            text-align: right;
        }

        .card-footer a {
            color: #007bff;
            text-decoration: none;
            font-size: 18px;
            cursor: pointer; /* Add cursor pointer to indicate the link is clickable */
        }

        .view-mode .form-control-plaintext {
            border: none; /* Remove border from the input fields in view mode */
            background-color: transparent; /* Make the input fields transparent in view mode */
        }
    </style>
</head>
<body>
<?php require('D_Navigation_Bar.php'); ?>
    <div class="container" id=" #containerx">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Welcome to Your Account
                    </div>
                    <div class="card-body">

                        <div class="view-mode">
                            <div class="form-group">
                                <label class="form-label"><i class="fa fa-user"></i> Account Holder:</label>
                                <input type="text" class="form-control" value="<?php echo $user['Name']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fa fa-envelope"></i> Email:</label>
                                <input type="text" class="form-control" value="<?php echo $user['Email']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fa fa-phone"></i> Contact No:</label>
                                <input type="text" class="form-control" value="<?php echo $user['Contact_No']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fa fa-user-circle"></i> Account Status:</label>
                                <input type="text" class="form-control" value="<?php echo $user['Verification']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i class="fa fa-user"></i> Medical_No:</label>
                                <input type="text" class="form-control" value="<?php echo $doctor['Medical_No']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fa fa-envelope"></i> Specialization:</label>
                                <input type="text" class="form-control" value="<?php echo $doctor['Specialization']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fa fa-phone"></i> Graduate Years:</label>
                                <input type="text" class="form-control" value="<?php echo $doctor['GraduateYears']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="fa fa-user-circle"></i>Workplace:</label>
                                <input type="text" class="form-control" value="<?php echo $doctor['Workplace']; ?>" disabled>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('D_Footer.php'); ?>
</body>
</html>
