<?php require_once('M_Connection.php');

// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';

if (isset($_POST["btnSubmit"])) 
{
    $Name = $_POST["txtName"];
    $Email = $_POST["txtUSerEmail"];
    $NIC = $_POST["txtNIC"];
    $Contact_No = $_POST["txtTelephoneNo"];
    $User_Role = $_POST["User_Role"];
    $Gender = $_POST["gender"];
    $Password = $_POST["txtPassword"];
    $Verification = "NotVerified";

    // Perform SQL to find if this email is registered in the website
    $sql1 = "SELECT * FROM user_registration WHERE NIC='$NIC' ";
    $ret1 = mysqli_query($con, $sql1);
    $num_row = mysqli_num_rows($ret1);
    if ($num_row > 0)
    {
       $row = mysqli_fetch_array($ret1);
       if($row['NIC'] == $NIC)
       {
           $alertMessage = "There are already accounts registered under this NIC.";
           $redirectLocation = "A_Patient_Management_Page.php";
       } 
    }   
    else 
    {
            //perform SQL
            $sql2 = "INSERT INTO user_registration (Name, Email, NIC, Contact_No, User_Role, Gender, Password, Verification)
            VALUES('$Name', '$Email', '$NIC', $Contact_No, '$User_Role', '$Gender', '$Password', '$Verification')";

            $result2 = mysqli_query($con, $sql2);
            if ($result2 > 0)
            {
                $alertMessage = "Registration successful!";
                $redirectLocation = "A_Patient_Management_Page.php";
            } 
            else 
            {
                $alertMessage = "Please Try Again Shortly....";
                $redirectLocation = "A_Patient_Management_Page.php";
            }
    } 
        // Disconnect 
        mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PR CARE- Patient Registration</title>
    <!-- Template Main CSS File -->
    <link href="css/A_User_Reg.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('A_Navigation_Bar.php'); ?>
    <div class="container-fluid" id="containerm">
        <!-- Form start -->
        <div class="container mt-3">
            <h1>Admin Panel - Patient Registration</h1>
            <?php if (!empty($alertMessage)) : ?>
                <div class="modal fade" id="outputModal" tabindex="-1" aria-labelledby="outputModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="outputModalLabel">Output Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php echo $alertMessage; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var modal = new bootstrap.Modal(document.getElementById('outputModal'));
                        modal.show();
                        // Redirect after displaying the message
                        var redirectLocation = '<?php echo $redirectLocation; ?>';
                        if (redirectLocation) {
                            setTimeout(function () {
                                window.location.href = redirectLocation;
                            }, 3000); // Redirect after 3 seconds (adjust as needed)
                        }
                    });
                </script>
            <?php endif; ?>
            <form class="row g-3 needs-validation" name="frmUserRegistration" method="post" autocomplete="off" action="#"  onsubmit="return result()" >
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Name:</label>
                <input type="text" class="form-control" name="txtName" id="txtName"  placeholder="Enter Your First Name" onkeyup="validateName()">
                <span id="Name_Error"></span>
            </div>
            <div class="inputfeild mt-3 ">
                <label class="form-label mb-2">UserEmail:</label>
                <input type="email" class="form-control" name="txtUSerEmail" id="txtUSerEmail" placeholder="Enter Your UserEmail" onkeyup="validateUserEmail()" >
                <span id="UserEmail_Error"></span>
            </div>
            <div class="inputfeild mt-3 ">
                <label class="form-label mb-2">NIC:</label>
                <input type="text" class="form-control" name="txtNIC" id="txtNIC" placeholder="Enter Your NIC" onkeyup="validateNIC()" >
                <span id="NIC_Error"></span>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Telephone No:</label>
                <input type="text" class="form-control" name="txtTelephoneNo" id="txtTelephoneNo"  placeholder="Enter Your Telephone No" onkeyup="validateTelephoneNo()">
                <span id="TelephoneNo_Error"></span>
            </div>
          <div class="inputfeild mt-3" >
           <label for="UserRole" class="form-label mb-2">I am ..</label>
           <input type="text" class="form-control" name="User_Role" id="User_Role" readonly value="Patient" placeholder="Enter Your Telephone No" >
          </div>
          <div class="inputfeild mt-3">
              <label class="form-label mb-2">Gender:</label>
              <input type="radio" name="gender" value="Male" id="Gender_Male" onkeyup="validate_gender()"> Male
              <input type="radio" name="gender" value="Female" id="Gender_Female" onkeyup="validate_gender()"> Female
              <input type="radio" name="gender" value="Other" id="Gender_Other" onkeyup="validate_gender()"> Other<br>
              <span id="Gender_Error"></span>
          </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Password:</label>
                <input type="text" class="form-control" name="txtPassword" id="txtPassword" value="1234@qwQW" readonly placeholder="Enter Password" onkeyup="validatePassword()">
                <label for="UserRole" class="form-label mb-2">Default Password For All Accounts.</label>
            </div>
        
        <!--Button-->
        <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit" >Submit Details</button>
    </form>
    </div>
    </div>
    <?php require('A_S_Footer.php'); ?>
  <script type="text/javascript">
    var Name_Error=document.getElementById('Name_Error');  
    var UserEmail_Error=document.getElementById('UserEmail_Error');
    var NIC_Error=document.getElementById('NIC_Error');
    var TelephoneNo_Error=document.getElementById('TelephoneNo_Error');  
    var Gender_Error = document.getElementById('Gender_Error');

function validateName()
{
  
  var Name=document.getElementById('txtName').value.replace(/^\s+|\s+$/g, "");
  if(Name.length == 0)
  {
    Name_Error.innerHTML='Name is required.';
    return false;
  }
  Name_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateUserEmail()
{
  var Email = document.getElementById('txtUSerEmail').value.replace(/^\s+|\s+$/g, "");

  if (Email.length == 0) 
  {
    UserEmail_Error.innerHTML='User Email is required.';
    return false;
  }
  else
  {
    var emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
   if (!Email.match(emaiPattern))
   {
    UserEmail_Error.innerHTML='Please Enter UserEmail in correct format.';
    return false;
   }
   UserEmail_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

function validateNIC()
{
  
  var NIC=document.getElementById('txtNIC').value.replace(/^\s+|\s+$/g, "");
  if(NIC.length == 0)
  {
    NIC_Error.innerHTML='NIC is required.';
    return false;
  }
  NIC_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateTelephoneNo()
{
  
  var TelephoneNo=document.getElementById('txtTelephoneNo').value.replace(/^\s+|\s+$/g, "");
  if(TelephoneNo.length == 0)
  {
    TelephoneNo_Error.innerHTML='Telephone No is required.';
    return false;
  }
  TelephoneNo_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}


  function validate_gender() 
  {
    var Gender_Male = document.getElementById('Gender_Male');
    var Gender_Female = document.getElementById('Gender_Female');
    var Gender_Other = document.getElementById('Gender_Other');

    if (!Gender_Male.checked && !Gender_Female.checked && !Gender_Other.checked) {
      Gender_Error.innerHTML = 'Please select a Gender.';
      return false;
    }
    Gender_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
  }

  document.getElementById("Gender_Male").addEventListener("click", function() {

if (document.getElementById("Gender_Male").checked == true || document.getElementById("Gender_Female").checked == true || document.getElementById("Gender_Other").checked == true ) {

    Gender_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}
});

function result()
{
  validateName();
  validateUserEmail();
  validateNIC();
  validateTelephoneNo();
  validate_gender();

if((!validateName()) || (!validateUserEmail()) || (!validateNIC()) || (!validateTelephoneNo()) || (!validate_gender()))
{
   return false;
}
}
</script>
</body>
</html>
