<!DOCTYPE html>
<html lang="en">
<head>
  <title>Token Display System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
    <style>
    
        .col-sm-2{
            color:dimgray;   
            background: lightyellow;
            border-radius: 20px;
        }
        .container-fluid{
            
        }
        h1, h4{
            color:white;
        }
        body{
            background:dimgray;
        }
        .active{
            color
            background: green;
        }
        h3{
            color:green;
        }
        
    </style>
    
<body>
<h4><center>Mukono Municipal Council</center></h4>
    <h1 ><center>Patient Tokens</center></h1>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-1"></div>
        
        <div class="col-sm-2 active">
            <center>
    <h2>Waiting</h2>
<?php
    
    include('dbcon.php');
    // Add upper and lower limit for the time stamp and expired tokens..
    
    $sql = "SELECT * from tokens where active ='1'";
    
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<h3>".$row['refid']."</h3><br>";
    }
    
    ?>
                </center>
    </div>
    
        <div class="col-sm-2">
        <center><h2>Screening</h2>
          <?php  
    $sql = "SELECT * from tokens where active ='2'";
    
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        
        echo "<h3>".$row['refid']."</h3><br>";
    
        
    }
    
    ?></center>
        </div>
        
        <div class="col-sm-2">
        <center><h2>Doctor</h2>
          <?php  
    $sql = "SELECT * from tokens where active ='3'";
    
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        
        echo "<h3>".$row['refid']."</h3><br>";
    
        
    }
    
    ?></center>
        </div>
        
        <div class="col-sm-2">
            <center>
            <h2>Pharmacy</h2>
        <?php
          $sql = "SELECT * from tokens where active ='4'";    
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<h3>".$row['refid']."</h3><br>";
    }
            ?>
                </center>
        </div>
      
        
        <div class="col-sm-2">
            <center>
            <h2>Expired Tokens</h2>
        <?php
          $sql = "SELECT * from tokens where active ='0'";    
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<h3>".$row['refid']."</h3><br>";
    }
            ?>
                </center>
        </div>
        
    </div>
    
    
    </div>
</body>
</html>
