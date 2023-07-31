<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="css/Doctor_style.css">
  </head>

  <body>
    <?php require('P_Navigation_Bar.php'); ?>
    <div style="margin: 100px 0px 100px 0px;">
      <div class="inner-layer">
        <div class="container">
          <div class="row no-margin">
            <div class="col-sm-7">
              <div class="content">
                <h1>Book Your Slot Now and Save Your Time</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis at lacus at rhoncus. Integer pharetra lacus vitae sapien blandit eleifend. </p>
                <h2>For Help Call: +189-123-453</h2>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-data">
                <div class="form-head">
                  <h2>Book Appointment</h2>
                </div>
                <div class="form-body">
                  <div class="row form-row">
                    <input type="text" placeholder="Enter Full Name" class="form-control">
                  </div>
                  <div class="row form-row">
                    <input type="text" placeholder="Enter Mobile Number" class="form-control">
                  </div>
                  <div class="row form-row">
                    <input type="text" placeholder="Enter Email Address" class="form-control">
                  </div>
                  <div class="row form-row">
                    <input type="text" placeholder="Select Doctor" class="form-control">
                  </div>
                  <h6>Appoinment  Details</h6>
                  <div class="row form-row">
                    <input id="dat" type="text" placeholder="Appointment Date" class="form-control">
                  </div>
                  <div class="row form-row">
                  <label for="option_select">Select an option:</label>
                  <select name="option_select" id="option_select">

                  <?php require_once('M_Connection.php');
                  $Name = '';
                  $Specialization = '';
                  $concatenated ='';
                   // Retrieve options from the database and populate the select box
                   $sql = "SELECT * FROM doctor_registration";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) 
                   {
                      while ($row = $result->fetch_assoc())
                      {
                      $Name = $row["Name"]; // Corrected variable name
                      $Specialization = $row["Specialization"]; // Corrected variable name
                      $concatenated = $Name . " " . $Specialization;
                      echo "<option value='$concatenated'>$concatenated</option>";
                      }
                   }
                   $conn->close();
                   ?>
                 </select>
                  </div>
                  <div class="row form-row">
                    <button class="btn btn-success btn-appointment">
                      Book Appointment
                    </button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script>
    $(document).ready(function () {
      $("#dat").datepicker();
    });
  </script>
</html>
