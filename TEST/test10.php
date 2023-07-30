<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('https://www.example.com/background-image.jpg'); /* Replace with your background image URL */
      background-size: cover;
      background-position: center;
    }

    .container {
      padding-top: 50px;
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
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Welcome to Your Account
          </div>
          <div class="card-body">
            <?php
              require_once('connection.php');
              $n = "g";
  
              // Sample query to retrieve user details
              $sql = "SELECT * FROM user_registration WHERE Name = '$n'"; // Properly enclosed $n in single quotes
              $result = $con->query($sql);

              if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
              } else {
                echo "<p class='text-danger'>No user found!</p>";
              }

              $con->close();
            ?>

            <p><strong><i class="fa fa-user"></i> Account Holder:</strong> <?php echo $user['Name']; ?></p>
            <p><strong><i class="fa fa-envelope"></i> Email:</strong> <?php echo $user['Email']; ?></p>
            <p><strong><i class="fa fa-phone"></i> Contact No:</strong> <?php echo $user['Contact_No']; ?></p>
            <p><strong><i class="fa fa-user-circle"></i> Account Type:</strong> <?php echo $user['User_Role']; ?></p>
          </div>
          <div class="card-footer">
            <a href="#">Edit Profile <i class="fa fa-pencil"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</body>
</html>
