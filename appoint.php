<?php
include('dbcon.php');

if(isset($_POST['submit'])){
    $pnid = $_POST['pnid'];
    $docid = $_POST['docid'];
    $comment = $_POST['comment'];
    
    $sql = "INSERT INTO tokens (pnid, docid, comments, token, active) VALUES ('{$pnid}', '{$docid}', '{$comment}', '0','1')";

if ($conn->query($sql) === TRUE) {
    $sql = "select * from tokens where pnid = '{$pnid}' and active = '1q'";

    $result = $conn->query($sql);

            if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $refid = $row['refid'];
    
            } else {
        echo "Some error Occured, Please contact IT!";
            }
    
    echo "<center>Appointment registered!<br>New Token Generated - <h1>".$refid."</h1><br><br> <a href = \"appointment.php\">Create Another Appointment</a></center>";
    
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
}
?>