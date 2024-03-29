<?php  require_once('M_Connection.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//


if(isset($_POST["btnSubmit"]))
{
  //create a new PHPMailer object:
 $mail = new PHPMailer(true);
  // 

$Email=$_POST["txtEmail"];
$password=$_POST["txtpassword"];
$confirmpassword=$_POST["txtConfirmPassword"];

if($password==$confirmpassword)
{
//perform sql
$sql = "UPDATE user_registration SET Password='$password' where Email='$Email' ";

$ret= mysqli_query($con, $sql);

 try {
       
        //Server settings
        //$mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'prcaretest@gmail.com';                     //SMTP username
        $mail->Password   = 'nxszjtvwqummfwby';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('prcaretest@gmail.com', 'PR CARE');
        //Add a recipient
        $mail->addAddress($Email);   
        //$mail->addAddress('ellen@example.com');      //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);       
        //$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Account recovered successfully';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Account recovered successfully</div>
        <p>Hi,<br>
        Dear User,<br>
        <b>Welcome back to your account.</b></p>
        <p>If you suspect you were locked out of your account because of changes made by someone else, please <a href="prcaretest@gmail.com"><b><u>contact</u></b></a> us immediately to protect your account.</p>
        <p>Thanks for helping us keep your account secure<br>Sincerely yours,<br>
        The PRCARE Team</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

         } 
         catch (Exception $e)
         {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }

     header('location:M_User_Login.php');

     echo '<script>alert("Succesfuly Update Your Password , Please Sign In")</script>';
     //disconnect 
     mysqli_close($con);

}
else
{
   echo '<script>alert("Password and Confirm Password is Mismatch")</script>';
}
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PR CARE - Forgotten Password</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- Template Main CSS File -->
  <link href="css/M_Update_Password.css" rel="stylesheet">
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
<div class="container-fluid" id="containerm"  >
<h1 id="h1">Update Account Password</h1>
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()" >
<div class="inputfeild mt-3">
    <label for="Email" class="form-label">UserEmail</label>
    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="UserEmail" onkeyup="validateEmail()" >
    <span id="Email_Error"></span>
</div>
<div class="inputfeild mt-3">
    <label for="password" class="form-label">New Password</label>
    <input type="text" class="form-control" id="txtpassword" name="txtpassword" placeholder="New Password" onkeyup="validatePassword()" >
    <span id="Password_Error"></span>
</div>
<div class="inputfeild mt-3">
    <label for="confirmpassword" class="form-label">Confirm New Password</label>
    <input type="text" class="form-control" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirm New Password" onkeyup="confirmPass()" >
    <span id="Confirm_Password_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" id="btnSubmit" class="btn btn-outline-dark btn-lg" name="btnSubmit">Continue</button>
</form>
</div>

<?php require('P_Footer.php');?>
<!-- Template Main JS File -->
<script src="js/main.js"></script>
<script type="text/javascript">
	 var Email_Error=document.getElementById('Email_Error');
    var Password_Error=document.getElementById('Password_Error');
    var Confirm_Password_Error=document.getElementById('Confirm_Password_Error');
function validateEmail()
{
  var Email = document.getElementById('txtEmail').value.replace(/^\s+|\s+$/g, "");
  if (Email.length == 0) 
  {
     Email_Error.innerHTML='Email is required.';
    return false;
  }
  else
  {
    var emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
   if (!Email.match(emaiPattern))
   {
    Email_Error.innerHTML='Please Enter Email in correct format.';
    return false;
   }
  Email_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

function validatePassword()
{
  var Password=document.getElementById('txtpassword').value.replace(/^\s+|\s+$/g, "");

  if (Password.length == 0) 
  {
    Password_Error.innerHTML='Password is required.';
    return false;
  }
  else
  {
    const PasswordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
   if (!Password.match(PasswordPattern))
   {
    Password_Error.innerHTML='Please Enter Password with Numbers,symbols,upper and lower case (minimum 8 characters)';
    return false;
   }
   Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

function confirmPass() {
  var Confirm_Password = document.getElementById('txtConfirmPassword').value.trim();
  var Passwordx = document.getElementById('txtpassword').value.trim();

  var Confirm_Password_Error = document.getElementById('Confirm_Password_Error');

  if (Confirm_Password.length === 0) {
    Confirm_Password_Error.innerHTML = 'Confirm Password is required.';
    return false;
  } else if (Confirm_Password !== Passwordx) {
    Confirm_Password_Error.innerHTML = 'Please Enter the correct password Again.';
    return false;
  } else {
    Confirm_Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
  }
}

function result()
{
  validateEmail();
  validatePassword();
  confirmPass();

if((!validateEmail()) || (!validatePassword()) || (!confirmPass()) ) 
  {
    return false;
  }
}
</script>
</body>
</html>