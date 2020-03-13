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
  <title>Pharmacy Stock Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Pharmacy Stock Register.</h2>
  <p>Displaying the current stock of medicines.</p>            
  <table class="table table-bordered">
      <thead>
      <tr>
        <th>M-ID</th>
        <th>Medicine</th>
        <th>Dosage</th>
          <th>Stock</th>
          <th>Notes</th>
          <th>Last_Updated</th>
      </tr>
    </thead>
      <tbody>
      <?php 
          
      // Think about expiry of medicines
      
$sql = "SELECT * FROM medicines";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    

    
     echo " <tr>
        <td>{$row['mid']}</td>
        <td>{$row['medicine']}</td>
        <td>{$row['dosage']}</td>
          <td>{$row['stock']}</td>
          <td>{$row['notes']}</td>
          <td>{$row['created_on']}</td>
          
      </tr>
      ";
}
   
        
        ?>
       </tbody>
  </table>
</div>

</body>
</html>
