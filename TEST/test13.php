<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
      cursor: pointer; /* Add cursor pointer to indicate the link is clickable */
    }

    .edit-field {
      display: none; /* Hide the input fields initially */
    }

    .save-button {
      display: none; /* Hide the Save button initially */
    }

    .edit-mode .field-label {
      display: none; /* Hide the field labels in edit mode */
    }

    .edit-mode .edit-field {
      display: block; /* Show the input fields in edit mode */
    }

    .edit-mode .save-button {
      display: block; /* Show the Save button in edit mode */
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
              $n = "t";
  
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

            <div class="edit-mode">
              <div class="form-group">
                <label class="field-label"><i class="fa fa-user"></i> Account Holder:</label>
                <input type="text" class="form-control edit-field" name="Name" value="<?php echo $user['Name']; ?>">
              </div>
              <div class="form-group">
                <label class="field-label"><i class="fa fa-envelope"></i> Email:</label>
                <input type="text" class="form-control edit-field" name="Email" value="<?php echo $user['Email']; ?>">
              </div>
              <div class="form-group">
                <label class="field-label"><i class="fa fa-phone"></i> Contact No:</label>
                <input type="text" class="form-control edit-field" name="Contact_No" value="<?php echo $user['Contact_No']; ?>">
              </div>
              <div class="form-group">
                <label class="field-label"><i class="fa fa-user-circle"></i> Account Type:</label>
                <input type="text" class="form-control edit-field" name="User_Role" value="<?php echo $user['User_Role']; ?>">
              </div>
              <button class="btn btn-primary save-button">Save</button>
            </div>

            <div class="view-mode">
              <p><strong><i class="fa fa-user"></i> Account Holder:</strong> <span><?php echo $user['Name']; ?></span></p>
              <p><strong><i class="fa fa-envelope"></i> Email:</strong> <span><?php echo $user['Email']; ?></span></p>
              <p><strong><i class="fa fa-phone"></i> Contact No:</strong> <span><?php echo $user['Contact_No']; ?></span></p>
              <p><strong><i class="fa fa-user-circle"></i> Account Type:</strong> <span><?php echo $user['User_Role']; ?></span></p>
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
  <script>
    function toggleEdit() {
      var editMode = document.querySelector('.edit-mode');
      var viewMode = document.querySelector('.view-mode');
      var editLink = document.querySelector('.edit-link');

      if (editMode.style.display === "none") {
        editMode.style.display = "block";
        viewMode.style.display = "none";
        editLink.innerText = "Cancel"; // Change link text to "Cancel" in edit mode
      } else {
        editMode.style.display = "none";
        viewMode.style.display = "block";
        editLink.innerText = "Edit Profile"; // Change link text back to "Edit Profile" in view mode
      }
    }

    // Add event listener to the Save button
    document.querySelector('.save-button').addEventListener('click', function() {
      var editFields = document.querySelectorAll('.edit-field');
      var userData = {};

      editFields.forEach(function(field) {
        var fieldName = field.getAttribute('name');
        var fieldValue = field.value;
        userData[fieldName] = fieldValue;
      });

      // Send the updated user data to the server using AJAX
      $.ajax({
        type: 'POST',
        url: 'update_profile.php', // PHP script to handle the database update
        data: userData,
        success: function(response) {
          // Handle the response from the server (e.g., show a success message)
          console.log(response);
          // Assuming response is a JSON object containing the updated user data, you can update the view mode fields
          var viewFields = document.querySelectorAll('.view-mode p');
          viewFields.forEach(function(field) {
            var fieldName = field.querySelector('strong').innerText;
            field.querySelector('strong').innerText = fieldName + ':';
            field.querySelector('span').innerText = userData[fieldName];
          });

          // Switch back to view mode
          toggleEdit();
        },
        error: function(error) {
          console.error('Error updating profile:', error);
        }
      });
    });
  </script>
</body>
</html>
