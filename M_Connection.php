<?php
  //connection
  //$con = mysqli_connect("dbserver", "dbuser","dbpassword","dbname" );
  $con = mysqli_connect("localhost:3306", "root","DdCya995142@4681","helthcare" );

 //checking the connection
    if(mysqli_connect_errno())
    {
    	die('Database Connection Failed');
    }
  
?>