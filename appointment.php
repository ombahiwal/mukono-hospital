<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Appointment and Token Generation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
    
  <center><h2>- Patient Appointment and Token Generation -</h2></center>
    <br><br>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
  <form class="form-horizontal" action="appoint.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" >Patient NID / Passport No.: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter National ID or Passport Number" name="pnid">
      </div>
    </div>
      
      <div class="form-group">
  <label for="sel1">Appoint Available Doctor:</label>
  <select name="docid" class="form-control" id="sel1">
    <option value="" selected disabled>select a doctor</option>
      
      <?php
      
      include('dbcon.php');
      $sql = "select * from doctors where online_status='1'";
      $result = $conn->query($sql);
      
      while($row = $result->fetch_assoc()){
          
          echo "<option value=\"{$row['dnid']}\">".$row['fname']." ".$row['lname']." </option>\n";   
      
      }
      
      
      
      ?>
          
          </select>
          
        
</div>
     
       
<div class="form-group">
  <label for="comment">Comments : </label>
  <textarea class="form-control" rows="4" id="comment"></textarea>
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
        <button type="submit" name="submit" class="btn btn-default">Generate Token</button>
      </div>
    </div>
  </form>
            </div>
        
        <div class="col-sm-5">
        
        </div>
            
        </div>
</div>

</body>
</html>