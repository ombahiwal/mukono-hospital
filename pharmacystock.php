<?php

// Create a medicinal database.
// Stock Management page - Stock Display, issuing
// 
// Create a dispensary page for substracting the stock

include('dbcon.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pharmacy Stock Dispense Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <h2>Pharmacy Stock Dispensary.</h2>
  <p>Displaying the current stock of medicines.</p>
    <form  method="post">
  <table class="table table-bordered">
      <thead>
      <tr>
          <th>SNo.</th>
        <th>M-ID</th>
        <th>Medicine</th>
        <th>Dosage</th>
          <th>Stock</th>
          <th>Desc</th>
            <th>Date of Expiry</th>
          <th>Personnel Initials</th>
          <th>Date of Issue</th>
          <th>Last_Updated</th>
          <th>Dispense Quantity</th>
          <th>Confirm?</th>
           <tr>
       
        
      
      </tr>
    </thead>
      <tbody>
      <?php 
          
      // Think about expiry of medicines

          
$sql = "SELECT * FROM medicines";

$result = $conn->query($sql);
$srn = 0;
while($row = $result->fetch_assoc()){
    $srn = $srn+1;
    echo " <tr>
    <td>{$srn}</td>
        <td>{$row['mid']}</td>
        <input type=\"hidden\" name=\"\" value=\"{$row['mid']}\">
        <td>{$row['medicine']}</td>
        <td>{$row['dosage']}</td>
          <td>{$row['stock']}</td>
          <td>{$row['notes']}</td>
          <td>{$row['expiry']}</td>
          <td>{$row['personnel']}</td>
          <td>{$row['doe']}</td>
          <td>{$row['created_on']}</td>
          <td><input type=\"number\" name=\"{$row['mid']}\"></td>
          <td><input type=\"checkbox\" name=\"medicines[]\" value=\"{$row['mid']}\">  </td>
      </tr>
      ";
}
   
        ?>
       </tbody>
  </table>
        <input name="submit_stock" type="submit">
        </form>
</div>

</body>
</html>
