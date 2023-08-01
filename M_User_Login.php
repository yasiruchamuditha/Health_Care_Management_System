<?php require('M_Connection.php');
if(isset($_POST["btnSubmit"]))
{
    session_start();
    $Email=$_POST["txtUserEmail"];
    $Password=$_POST["txtPassword"]; 
	if(empty($Email) || empty($Password))
    {
      echo '<script>alert("Filed cannot be blank")</script>';
    }
	else
	{
		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
		{
			echo '<script>alert("Please Enter Valid UserEmail")</script>';       
		}
		else
		{	
       //perform sql
        $sql = "SELECT * FROM user_registration WHERE  Password='$Password' and Email='$Email' ";
        $result= mysqli_query($con, $sql);
        $num_row = mysqli_num_rows($result);
          if ($num_row >0) 
            { 
               $row = mysqli_fetch_array($result);
                if($row['User_Role'] == 'Admin')
                {
                     $_SESSION['Email'] =  $Email;
                     header('location:A_Admin_Panel.php'); 
                }
                elseif($row['User_Role'] == 'Doctor')
                {
                     $_SESSION['Email'] =  $Email;
                     header('location:D_Doctor_Panel.php'); 
                }
                elseif($row['User_Role'] == 'Patient') 
                {
                    $_SESSION['Email'] =  $Email;
                    header('location:index.php'); 
                }                             
            }
            else
            {
                 echo '<script>alert("Invalid Username and Password Combination")</script>';
            }
        //disconnect 
         mysqli_close($con);
        }
       
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PR CARE - User Login</title>
<!-- Template Main CSS File -->
<link href="css/M_User_Login.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
  <div class="container-fluid" id="containerm" >
  <!-- Form start -->
	<div class="container mt-4" >
    <h1 >LOG IN</h1>
    <form class="row g-3 needs-validation" action="#" name="frmUserlogin" method="post" autocomplete="off" onsubmit="return result()" >
  <!--UserEmail-->
  <div class="inputfeild mt-4">
    <label for="UserEmail" class="form-label">UserEmail :</label>
    <input type="text" class="form-control" name="txtUserEmail" id="txtUserEmail" placeholder="Enter Your User Email" onkeyup="validateUserEmail()" >
    <span id="UserEmail_Error"></span>
  </div>
<!--Password-->
<div class="inputfeild mt-4">
  	<label for="Password" class="form-label">Password :</label>
  	<input type="text" class="form-control" name="txtPassword" id="txtPassword" placeholder="Enter Your Password"  onkeyup="validatePassword()">
    <span id="Password_Error"></span>
  </div>
<!--Check Terms -->
  <div class="inputfeild mt-4 form-check">
    <input type="checkbox" class="form-check-input" name="chkCheck" id="chStatus" onkeyup="validateTerms()"  >
    <label class="form-check-label" for="checkbox">Agree to Terms and Conditions</label><br>
    <span id="Check_Error"></span>
  </div>
  <div class="inputfeild mt-4">
    <label for="ForgottenPassword" class="form-label" ><a href="M_Forgotten_Password.php" target="_blank" id="forgotten"  >Forgotten Password ? Click Here. </a></label><br>
    <label for="Signup" class="form-label" ><a href="M_User_Registration.php" target="_blank"  id="signup" >Don't Have Account ? Click Here. </a></label><br>
  </div>  
 <!--Button-->
  <button type="submit" class="btn btn-outline-primary btn-lg" id="btnSubmit" name="btnSubmit" >Submit</button>
</form>
</div>
</div>
<?php require('P_Footer.php');?>
<script type="text/javascript">
var UserEmail_Error=document.getElementById('UserEmail_Error');  
var Password_Error=document.getElementById('Password_Error');
var Check_Error=document.getElementById('Check_Error');

function validateUserEmail()
{
  var Email = document.getElementById('txtUserEmail').value.replace(/^\s+|\s+$/g, "");

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

function validatePassword()
{
  
  var Password=document.getElementById('txtPassword').value.replace(/^\s+|\s+$/g, "");
  if(Password.length == 0)
  {
    Password_Error.innerHTML='Password is required.';
    return false;
  }
  Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateTerms()
{
  if(document.getElementById("chStatus").checked == false)
  {
  Check_Error.innerHTML='Please Agree To Terms and Conditions.';
  return false;
  }
   Check_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("chStatus").addEventListener("click", function() {

  if(document.getElementById('chStatus').checked == true){ 

  Check_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});
//@author: SS Labs
function result()
{
  validatePassword();
  validateUserEmail();
  validateTerms();

if((!validateUserEmail()) || (!validatePassword()) || (!validateTerms()) )
  {
    return false;
  }
}
</script>
</body>
</html>
