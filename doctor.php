<?php
include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Doctor's Interface</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
    
  <center><h2>- Doctor's Patient Management -</h2></center>
 <br><br>
    <div class="row">
    <div class="col-sm-6">
        
        <form class ="form-horizontal" action="doctor.php" method="post">
    
            <div class="form-group">
      <label class="control-label col-sm-2"> Token No. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control"  placeholder="Enter Token Number of the Patient" name="token">
      </div>
        
    </div>
      
            <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submittoken" class="btn btn-default">Fetch Details</button>
      </div>
    </div>
            
        </form>
        
        
        <table class="table table-hover">
    
<?php
        if(isset($_POST['submittoken'])){    
            
         $token = $_POST['token'];
            $sql = "SELECT * FROM tokens where refid='{$token}'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $pnid = $row['pnid'];
    
         
                $sql = "SELECT * from patient_info where pnid ='{$pnid}'";
                
                $result = $conn->query($sql);
     if($result){
                $row = $result->fetch_assoc();
                
                $cat = $row['category'];
                if($cat == 0){
                    $cat = "National";
                }else if($cat == 1){
                    $cat = "Foriegner";
                }else{
                    $cat = "Refugee";
                }
                
                $gender = $row['pgender'];
                
                if($gender == 0){
                    $gender = "Male";
                }else{
                    $gender = "Female";
                }
            
                
                
                 $birthDate = $row['dob'];
  //explode the date to get month, day and year
  $birthDate = explode("-", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
    : (date("Y") - $birthDate[0]));
                
               echo  "
    <tbody>
    
    <th>{$row['plname']}</th>
    <th>{$row['pfname']}</th>
    <th>{$gender}</th>
    
      <tr>
        <td>{$row['dob']} (Age : {$age})</td>
        <td>{$cat}</td>
        <td>{$row['paddress']}</td>
      </tr>
      
      <tr>  
      <td>BP : {$row['bp']} mmHg</td>
      <td>Weight : {$row['weight']} kg</td>
      <td>Height : {$row['height']} cm</td>
      </tr>
      <tr><td></td></tr>
    </tbody>";
        
        
        }else {
        echo "No Such Token found!";
            }
        }
        }
$conn->close();
            
         
        /*
        
          <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      
        */
        ?>
  </table>
        
        
        </div>
        
        
        
    <div class="col-sm-6">
        
    <form <?php if(!isset($_POST['token'])){echo 'style="display:none"';} ?> class="form-horizontal" action="docprescription.php" method="post">  
      <input type="hidden" name="pnid" value="<?php echo $pnid; ?>">
        <input type="hidden" name="ptoken" value=" <?php if(isset($_POST['token'])){echo "{$_POST['token']}";}?>" >
      <?php
        
        // for now rely on token setting, later change it to the connection result and doctor's session
        if(isset($_POST['token'])){
        
        $docnid = "T123";
            
        
        echo "<input type=\"hidden\" name=\"bp\" value=\"{$row['bp']}\">
        <input type=\"hidden\" name=\"height\" value=\"{$row['height']}\">
        <input type=\"hidden\" name=\"weight\" value=\"{$row['weight']}\">
        <input type=\"hidden\" name=\"dnid\" value=\"{$docnid}\">
    
        ";
            
            // Later Input Doc Id also, right now, putting Id of the only registered Doctor's NID - T123 ! 
        }
        ?>
    
      <div class="form-group">
          <label for="medic">Medicines :</label>
          <select id="medic" name="medic" multiple>
          
              <?php 
          
      // Think about expiry of medicines
      include("dbcon.php");
$sql = "SELECT * FROM medicines";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    
     echo " 
        <option>{$row['medicine']}</option>
      ";
}
   
        
        ?>
              
              
          </select>
        </div>
        
        
     <div class="form-group">
  <label for="comment">Other Medicines : </label>
  <textarea name="medicines" class="form-control" rows="4" id="comment"></textarea>
</div>
      
      <div class="form-group">
  <label for="comment">Diagnosis : </label>
  <textarea name="diagnosis" class="form-control" rows="4" id="comment"></textarea>
          
</div>
        
         <div class="form-group">
  <label for="comment">Treatment Notes : </label>
  <textarea name="tnotes" class="form-control" rows="4" id="comment"></textarea>
          
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
        <button type="submit" name="submit" class="btn btn-default">Generate Prescription</button>
      </div>
    </div>
  </form>
        </div>
        </div>
</div>

</body>
</html>
