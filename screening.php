<?php
include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Screening</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
    
  <center><h2>- Patient Screening -</h2></center>
 <br><br>
    <div class="row">
    <div class="col-sm-6">
        
        <form class ="form-horizontal" action="screening.php" method="post">
    
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
                
                
               echo  "
    <tbody>
    
    <th>{$row['plname']}</th>
    <th>{$row['pfname']}</th>
    <th>{$gender}</th>
    
      <tr>
        <td>{$row['dob']}</td>
        <td>{$cat}</td>
        <td>{$row['paddress']}</td>
      </tr>
      
      <tr>
      <td>{$row['phone']} </td>
      </tr>
    </tbody>";
        
        
        }  
                
            } else {
        echo "No Such Token found!";
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
    <form <?php if(!isset($_POST['token'])){echo 'style="display:none"';} ?> class="form-horizontal" action="scrdata.php" method="post">  
      <input type="hidden" name="pnid" value="<?php echo $pnid; ?>">
      <input type="hidden" name="ptoken" value=" <?php if(isset($_POST['token'])){echo "{$_POST['token']}";}?>" >
      <div class="form-group">
      <label class="control-label col-sm-2"> Height (cm): </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter the Height of the Patient" name="pheight">
      </div>
    </div>
      
       <div class="form-group">
      <label class="control-label col-sm-2"> Weight (kg): </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter the Weight of the Patient" name="pweight">
      </div>
    </div>
      
        <div class="form-group">
      <label class="control-label col-sm-2"> BP (mmHg): </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter the Blood Pressure of the Patient" name="pbp">
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
        <button type="submit" name="submit" class="btn btn-default">Submit Data</button>
      </div>
    </div>
  </form>
        </div>
        </div>
</div>

</body>
</html>
