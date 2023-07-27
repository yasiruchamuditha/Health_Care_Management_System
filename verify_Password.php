<?php require_once('connection.php');
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
	$email=$_POST["txtemail"];
	//create a new PHPMailer object:
    $mail = new PHPMailer(true);
    
    try {
       
        //Server settings
        //$mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fuelupgroup@gmail.com';                     //SMTP username
        $mail->Password   = 'yxejuwcqpkztsmln';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('fuelupgroup@gmail.com', 'Fuel Up');
        //Add a recipient
        $mail->addAddress($email);   
        //Content
        $mail->isHTML(true);       
        $verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Account Verification';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Account Verification Code</div><p>Hi,<br>Dear User,<br>We received a request to reset the password on your FuelUp Account.Your Verification Code is: <b>'.$verification_code.'</b><br>Enter this code to complete the reset of account Password.This code will expire in 24 hours.If you did not request this code, someone probably gave your email address by mistake. You can safely ignore this email.</p><p>please <a href="fuelupgroup@gmail.com"><b><u>contact</u></b></a> us for more Details. </p><p>Thanks for helping us keep your account secure.<br>Sincerely yours,<br>The FuelUp Team</p><br>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

        //perform sql
        $sql = "INSERT INTO passwordupdates(UserEmail,VerificationCode) VALUES ('$email','$verification_code')";
 
        $ret= mysqli_query($con, $sql);
     
        header('location:verifycode.php');
   

     //disconnect 
      mysqli_close($con);
    } 
    catch (Exception $e)
     {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Verify Password - User Account</title>
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
   <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/forgotten_password.css" rel="stylesheet">
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('navigationBarForms.php');?>
<div class="container-fluid" id="containerm"  >
<h1 id="h1">Verify User Account</h1>
    <form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()" >
        <div class="inputfeild mt-3">
            <label for="heading" class="form-label mt-5">Enter Verification Code that Send to Your Email for verify Your Account</label>
            <label for="lable" class="form-label mt-5">Verification Code</label>
            <input type="text" class="form-control mt-2" id="txtcode" name="txtcode" placeholder="Verification Code" onkeyup="validateCode()" style="margin-top: 50px;">
            <span id="Code_Error"></span>
        </div>
    <!--Button-->
    <button type="submit" id="btnSubmit" class="btn btn-outline-dark btn-lg" name="btnSubmit">Continue</button>
    </form>
</div>
<?php require('footer.php');?>
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
  <script type="text/javascript">
function validateCode()
{
  
  var Code=document.getElementById('txtcode').value.replace(/^\s+|\s+$/g, "");
  if(Code.length == 0)
  {
    Code_Error.innerHTML='Verification Code is required.';
    return false;
  }
  Code_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}


function result()
{
  validateCode();

if(!validateCode())  
  {
    return false;
  }
}

</script>
</body>
</html>