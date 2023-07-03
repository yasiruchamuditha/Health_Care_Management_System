<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Login</title>
</head>
<body>
<?php require('navigationBarForms.php');?>
    <div class="container-fluid" style="margin-top: 100px;">
       <!-- Form start -->
	<div class="container mt-2">
    <h1 >Vehicle Registration</h1>
    <form class="row g-3 needs-validation" action="#" name="frmvehicleregistration" method="post" autocomplete="off" onsubmit="return result()" >
<!--Vehicle Registration No-->
  <div class="inputfeild mt-2 ">
  	<label for="Vehicle Registration No" class="form-label">Vehicle Registration No</label>
  	<input type="text" class="form-control" name="txtRegNo" id="txtRegNo" placeholder="Ex:ABC-1234"  onkeyup="validateRegistrationNo()">
    <span id="Registration_Error"></span>
  </div>
	
<!--Engine No-->
  <div class="inputfeild mt-2">
  	<label for="Engine No" class="form-label" >Engine No</label>
    <input type="text" class="form-control" id="txtEngineNo" name="txtEngineNo" placeholder="Engine No"  onkeyup="validateEngineNo()">
    <span id="Engine_Error"></span>
  </div>

  <!--Chassis No -->
  <div class="inputfeild mt-2">
  	<label for="Chassis No" class="form-label">Chassis No</label>
    <input type="text" class="form-control" name="txtChassisNo" id="txtChassisNo" placeholder="Chassis No"  onkeyup="validateChassisNo()" >
    <span id="Chassis_Error"></span>
  </div>

<!--Vehicle Class-->
  <div class="inputfeild mt-2">
      <label for="Vehicle Class" class="form-label">Vehicle Class</label>
      <select id="VehicleClass" name="VehicleClass" class="form-control" onkeyup="validateVehicleClass()">
          <option  value="S">Choose...</option>
          <option value="A">A  [Motor Cycle Above 100 cc]</option>
          <option value="A1">A1 [Light Motor Cycle Below 100 cc]</option>
          <option value="B">B  [Dual Purpose Motor Vehicle]</option>
          <option value="B1">B1 [Motor TriCycle Or Van]</option>
          <option value="C">C  [Motor Lorry]</option>
          <option value="C1">C1 [Light Motor Lorry]</option>
          <option value="CE">CE [Heavy Motor Lorry]</option>
          <option value="D">D  [Motor Coach]</option>
          <option value="D1">D1 [Light Motor Coach]</option>
          <option value="DE">DE [Heavy Motor Coach]</option>
          <option value="G">G  [Land Vehicle]</option>
          <option value="G1">G1 [Hand Tactor]</option>
          <option value="J">J  [Special Purpose Vehicle]</option>
      </select>

      <div id="ClassHelp" class="inputfeild form-text" >Can't Find Vehicle Class,<a href="https://dmt.gov.lk/index.php?option=com_content&view=article&id=46&Itemid=163&lang=en" target="_blank">Click Here</a><br>
      <span id="VehicleClass_Error"></span>
      </div>
  </div>	

<!--Fuel Type-->
   <div class="inputfeild mt-2 form-group ">
        <label for="FuelType" class="form-label">Fuel Type</label>
        <select id="FuelType" name="cmbFuelType" class="form-control"  onkeyup="validateFUELTYPE()">
             <option  value="S">Choose...</option>
             <option value="Petrol">Petrol</option>
             <option value="Diesal">Diesal</option>
        </select>
        <span id="FuelType_Error"></span>
   </div> 

  <!--EMAIL No -->
  <div class="inputfeild mt-2">
    <label for="Email" class="form-label">UserEmail</label>
    <input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="someone@company.com"  onkeyup="validateEmail()" >
    <span id="Email_Error"></span>
  </div>

<!--Check Terms -->
  <div class="inputfeild mt-3 mx-2 form-check">
    <input type="checkbox" class="form-check-input" name="chkCheck" id="chStatus" onkeyup="validateTerms()"  >
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label><br>
    <span id="Check_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" class="btn btn-outline-primary btn-lg" id="btnSubmit" name="btnSubmit" >Submit</button>

</form>
</div>
</div>
<?php require('footer.php');?>
</body>
</html>
