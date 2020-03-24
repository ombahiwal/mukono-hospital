<?php
session_start();
include('dbcon.php');
if(!isset($_SESSION['dnid'])){
       echo "<script> window.location.href = \"doclogin.php\";</script>";
}


if(isset($_POST['tests'])){
    $teststring = "";
    $pheight  = $_POST['height'];
    $pweight = $_POST['weight'];
    $pnid = $_POST['pnid'];
    $ptoken = $_POST['token'];
    $pbp = $_POST['bp'];
    $dnid = $_SESSION['dnid'];
    
    
echo "Token No. : ".$token."<br>";
    echo "Selected Tests : <br>";
    
    
    foreach ($_POST['tests'] as $test){
        echo $test."<Br>";
        $teststring = $teststring."".$test." ";        
    
    }   
    
    $sql = "insert into opd_prescription (height, weight, pnid, ptoken, bp, dnid, labtestids) values ('{$pheight}', '{$pweight}', '{$pnid}', '{$ptoken}', '{$pbp}', '{$dnid}', '{$teststring}')";
   
    $result = $conn->query($sql);
    if($result){
        echo "
        <h3>Prescription Process Generated Successfuly!</h3>";
        
        $sqlupdatetoken = "UPDATE tokens set active='5' where refid='{$ptoken}'";
        $res = $conn->query($sqlupdatetoken);
        if($res){
            echo "Token Updated!";
        }else{
            echo "Couldnot Update Token!";
        }
        
        
        
        
        echo "<h3><br> Redirecting...</h3>
             <script>  var timer = setTimeout(function() {
            window.location='doctor.php'
        }, 3000);
        </script>
             ";
    }else{
        echo "Could not generate prescription, Please Try Again! or contact IT..";
    }
    
}else{
     echo "<h3> 
             <br> Redirecting...</h3>
             <script>  var timer = setTimeout(function() {
            window.location='doctor.php'
        }, 3000);
        </script>
             ";
}
?>