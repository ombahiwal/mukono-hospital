<?php

include('dbcon.php');

$pheight = $_POST['pheight'];
$pbp = $_POST['pbp'];
$pweight = $_POST['pweight'];
$pnid =$_POST['pnid'];
$ptoken = $_POST['ptoken'];
$sql = "Update patient_info set height='{$pheight}', weight='{$pweight}', bp='{$pbp}' where pnid='{$pnid}'";



if($conn->query($sql) == TRUE){
 
      $sql = "UPDATE tokens set active='3' where refid='{$_POST['screentoken']}'";
           $result = $conn->query($sql);
    
    echo "Patient Screening Data Updated Successfully!<br>
    Token Forwarded!";
    
   
}else{
    echo "Some error has orrcured,<br>Details Not Updated!";
}

 /* //inserting in opd_prescription
    $sql = "insert into opd_prescription(height, weight, pnid, ptoken, bp) values('{$pheight}', '{$pweight}', '{$pnid}', '{$ptoken}', '{$pbp}')";
    
    if($conn->query($sql) == TRUE){
    echo "<br>OPD Precription process initiated successfully!";
    }
    
    */
    


?>