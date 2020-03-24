<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Doctor Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    
  <h2>- Doctor Registration -</h2>
  <form class="form-horizontal" action="regdoctor.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" >First Name : </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter First Name" name="pfname">
      </div>
    </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2" >Last Name : </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Surname" name="plname">
      </div>
    </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2" >NID / Passport No. : </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter National ID or Passport No. " name="pnid">
      </div>
    </div>
      
      
      <div class="form-group">
      <label class="control-label col-sm-2"> Specialization : </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"   name="special">
      </div>
    </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2" >Gender : </label>
      <div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="0" name="pgender"> Male
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="1" name="pgender"> Female
  </label>
</div>

    </div>
       
      <div class="form-group">
      <label class="control-label col-sm-2"> DOB : </label>
      <div class="col-sm-10">
        <input type="date" class="form-control"   name="pdob">
      </div>
    </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2"> Phone : </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"   name="phone">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2"> Email : </label>
      <div class="col-sm-10">
        <input type="email" class="form-control"   name="email">
      </div>
           <?php
      if(isset($_GET['already'])){
          echo "<h4 style=\"color:red\">User Already Exists!</h4>";
      }
      ?>
    </div>
     
      
      
      <div class="form-group">
      <label class="control-label col-sm-2">Create New Password : </label>
      <div class="col-sm-10">
        <input type="password" class="form-control"  placeholder="Create a Strong Password" name="pwdone">
      </div>
    </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2">Confirm Password : </label>
      <div class="col-sm-10">
        <input type="password" placeholder="Retype the Password" class="form-control"   name="pwdtwo">
      </div>
          <?php
      if(isset($_GET['invalidp'])){
          echo "<h4 style=\"color:red\">Passwords do not match!</h4>";
      }
      ?>
    </div>
      
      
      <div class="form-group">
      <label class="control-label col-sm-2"> Address : </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Village, Parish, Sub-county, District, City, Country" name="paddress">
      </div>
    </div>
      
      
      
<!--
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd"> ID Document No.</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Document ID" name="pwd">
      </div>
    </div>
-->
      
    
<!--
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
-->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-default">Register</button>
      </div>
    </div>
  </form>
</div>
    
    <?php
    


//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include('dbcon.php');
    

// Inserting Data
if(isset($_POST['submit'])){
    
    
    if(isset($_POST['email'])){
        $sql = "SELECT * from doctors where email='{$_POST['email']}'";
        $result = $conn->query($sql);
        if($result->num_rows){
            echo "<script>window.location.href = \"regdoctor.php?already=1\";</script>";
        }
    }
    
    
    // Check Passwords
    if($_POST['pwdone'] != $_POST['pwdtwo']){
echo "Password Does Not Match!";
        echo "<script>window.location.href = \"regdoctor.php?invalidp=1\";</script>";
    }else{

$pwd = $_POST['pwdtwo'];     
$pdob = $_POST['pdob'];
$pfname = $_POST['pfname'];
$plname = $_POST['plname'];
$dnid = $_POST['pnid'];
$dcategory = $_POST['pcategory'];
$pgender = $_POST['pgender'];
$paddress = $_POST['paddress'];
$phone = $_POST['phone'];
$special = $_POST['special'];
$email = $_POST['email'];
$sql = "INSERT INTO doctors (dnid, fname, lname, gender, address, dob, phone, speciality, pwd, email, online_status) VALUES ('{$dnid}', '{$pfname}', '{$plname}', {$pgender}, '{$paddress}', '{$pdob}', '{$phone}', '{$special}', '{$pwd}', '{$email}', '0')";

if ($conn->query($sql) === TRUE) {
    echo "<h3 style=\"color:green\"><center>New record created successfully!</center></h3>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

}
?>

</body>
</html>