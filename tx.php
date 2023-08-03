<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* ... (existing CSS styles) ... */
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
              require_once('M_Connection.php');

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $contactNo = $_POST["contact_no"];
                $userRole = $_POST["user_role"];

                // Sample query to update user details
                $sql = "UPDATE user_registration SET Name='$name', Email='$email', Contact_No='$contactNo', User_Role='$userRole' WHERE Name = 'g'";
                if ($con->query($sql) === TRUE) {
                  echo "<p class='text-success'>Profile updated successfully!</p>";
                } else {
                  echo "<p class='text-danger'>Error updating profile: " . $con->error . "</p>";
                }
              }

              // Fetch user data from the database
              $n = "g";
              $sql = "SELECT * FROM user_registration WHERE Name = '$n'";
              $result = $con->query($sql);
              if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
              } else {
                echo "<p class='text-danger'>No user found!</p>";
              }

              $con->close();
            ?>

            <div class="edit-mode">
              <form id="edit-form" method="post">
                <div class="form-group">
                  <label class="field-label"><i class="fa fa-user"></i> Account Holder:</label>
                  <input type="text" class="form-control edit-field" name="name" value="<?php echo $user['Name']; ?>">
                </div>
                <div class="form-group">
                  <label class="field-label"><i class="fa fa-envelope"></i> Email:</label>
                  <input type="text" class="form-control edit-field" name="email" value="<?php echo $user['Email']; ?>">
                </div>
                <div class="form-group">
                  <label class="field-label"><i class="fa fa-phone"></i> Contact No:</label>
                  <input type="text" class="form-control edit-field" name="contact_no" value="<?php echo $user['Contact_No']; ?>">
                </div>
                <div class="form-group">
                  <label class="field-label"><i class="fa fa-user-circle"></i> Account Type:</label>
                  <input type="text" class="form-control edit-field" name="user_role" value="<?php echo $user['User_Role']; ?>">
                </div>
                <button type="submit" class="btn btn-primary save-button">Save</button>
              </form>
            </div>

            <div class="view-mode">
              <p><strong><i class="fa fa-user"></i> Account Holder:</strong> <?php echo $user['Name']; ?></p>
              <p><strong><i class="fa fa-envelope"></i> Email:</strong> <?php echo $user['Email']; ?></p>
              <p><strong><i class="fa fa-phone"></i> Contact No:</strong> <?php echo $user['Contact_No']; ?></p>
              <p><strong><i class="fa fa-user-circle"></i> Account Type:</strong> <?php echo $user['User_Role']; ?></p>
            </div>
          </div>
          <div class="card-footer">
            <a class="edit-link" onclick="toggleEdit()">Edit Profile <i class="fa fa-pencil"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script>
    /* ... (existing JavaScript code) ... */
  </script>
</body>
</html>
