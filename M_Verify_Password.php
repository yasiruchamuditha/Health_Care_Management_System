<?php require_once('M_Connection.php');
if(isset($_POST["btnSubmit"]))
{
  $code=$_POST["txtcode"];

        //perform sql
        $sql = "SELECT * FROM Password_Updates WHERE  VerificationCode='$code' ";
        $ret= mysqli_query($con, $sql);
        $num_row  = mysqli_num_rows($ret);
           if ($num_row >0) 
        {   
          echo '<script>alert("Succesful")</script>'; 
          header('location:M_Update_Password.php');  
        }
      else
        {
          echo '<script>alert("Invalid Verification Code")</script>';
          header('location:index.php'); 
        }

        //disconnect 
         mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PR CARE - Verify User Account</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/M_Forgotten_Password.css" rel="stylesheet">
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
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
<?php require('P_Footer.php');?>
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