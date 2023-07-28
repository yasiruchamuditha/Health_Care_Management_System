<?php require_once('connection.php');
//session_start();
if(isset($_GET['deleteid']))
{
	$deleteid=$_GET['deleteid'];
	$sql="Delete from user_registration where Email='$deleteid' ";
	$ret= mysqli_query($con, $sql);
	 if ($ret) 
	  {
	  	echo '<script>alert("Successfuly Deleted")</script>';
	  }
	  else
	  {
	  	echo '<script>alert("Please Try Again Shortly....")</script>';
	  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin Panel - User Account Management</title>
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
</head>
<body>
<?php require('A_Navigation_Bar.php');?>
<div class="container" style="margin-top:100px;">
<h1>Admin Panel - User Profile Management</h1>
<p class="header">Add New User Profiles - <button class="btn btn-primary "><a href="A_User_Registration.php" class="text-light">Click Here</a></button></p>
<p class="header">PR User Profiles [Doctor Profiles,Patient Users Profiles,Admin Profiles]</p>
<table class="table">
<thead>	
    <tr  class="table-info">
      <th scope="col">Name</th>
      <th scope="col">Contact No</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
    </tr>
 </thead>
  <tbody>
 <?php
 $sql="SELECT * FROM user_registration";
 $ret= mysqli_query($con, $sql);
 if ($ret) 
 {
 	while($row=mysqli_fetch_assoc($ret))
 	{
 		$Name=$row['Name'];
 		$Contact_No=$row['Contact_No'];
 		$Email=$row['Email'];
 		$Password=$row['Password'];

 		echo'<tr>
              <th scope="row">'.$Name.'</th>
              <td>'.$Contact_No.'</td>
              <td>'.$Email.'</td>
              <td>'.$Password.'</td>
              <td><button class="btn btn-danger" name="btnDelete"><a href="A_User_Account_Management_page.php?deleteid='.$Email.'" class="text-light">Delete</a></button></td>
             </tr>';
 	}
 }
?>
</tbody>
</table>
</div>
<?php require('A_Footer.php');?>
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
</body>
</html>