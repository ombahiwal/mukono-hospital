
<?php

// Create a medicinal database.
// Stock Management page - Stock Display, issuing
// 
// Create a dispensary page for substracting the stock

include('dbcon.php');
$init =1;
if(isset($_POST['submit_stock'])){
$init = 0;
    $flag = 0;
    $med = $_POST['medicine'];
    $dosage = $_POST['dosage'];
    $doe = $_POST['doe'];
    $stock = $_POST['stock'];
    $expiry = $_POST['expiry'];
    $desc = $_POST['description'];
    $personnel = $_POST['personnel'];
    
    $sql  = "Insert into medicines( medicine, dosage, notes, stock, expiry, personnel, doe) values('{$med}', '{$dosage}', '{$desc}', '{$stock}', '{$expiry}', '{$personnel}', '{$doe}')";
    
    $result = $conn->query($sql);
    if($result)
        $flag = 1;
    
        
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pharmacy Stock Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <h2>Initial Pharmacy Stock Register.</h2>
  <p>For inserting New medicine stock to the pharmacy database<br>
    Please make sure that the records are unique</p>
    <form method="post">
  <table class="table table-bordered">
      <thead>
      <tr>
        <th>M-ID</th>
        <th>Medicine</th>
        <th>Dosage</th>
          <th>Date of Expiry</th>
          <th>Stock Quantity</th>
          <th>Description</th>
          <th>Date Issued</th>
          <th>Personnel Initials</th>
      </tr>
    </thead>
      <tbody>
    <tr>
          <td>#auto</td>
        <td><input type="text" name="medicine" ></td>
        <td><input type="text" name="dosage" ></td>
        <td><input type="date" name="expiry" ></td>
        <td><input type="text" name="stock" ></td>
        <td><input type="text" name="description" ></td>
        <td><input type="date" name="doe"></td>
        <td><input type="text" name="personnel" ></td>
          </tr>
       </tbody>
  </table>
        <?php
        
        if($flag){
        echo "<h4 style=\"color:green\">New Record Inserted Successfully!</h4><br><h5></h5>";
        }else if($init != 1){
            echo "<h4 style=\"color:red\">Some Error Occured!<br>Please check the Values you have entered.<br>
            If problem persists, contact IT.</h4>";
        }
        ?>
        <input class="btn-warning" style="float:right; padding:10px" value="Insert Record" name="submit_stock" type="submit">
        </form>
</div>

</body>
</html>
