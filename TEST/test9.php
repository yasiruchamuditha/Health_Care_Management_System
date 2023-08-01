<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to Your Account</h1>
    <div id="account-info">
      <?php 
        require_once('connection.php');
        $n = "g";
  
        // Sample query to retrieve user details
        $sql = "SELECT * FROM user_registration WHERE Name = '$n'"; // Properly enclosed $n in single quotes
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
          $user = $result->fetch_assoc();
        } else {
          echo "No user found!";
        }

        $con->close();
      ?>

      <p><strong>Account Number:</strong> <?php echo $user['Name']; ?></p>
      <p><strong>Account Holder:</strong> <?php echo $user['Email']; ?></p>
      <p><strong>Balance:</strong> <?php echo $user['Contact_No']; ?></p>
      <p><strong>Account Type:</strong> <?php echo $user['User_Role']; ?></p>
    </div>
  </div>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
    }

    h1 {
      text-align: center;
    }

    #account-info {
      margin-top: 20px;
    }
  </style>
</body>
</html>
