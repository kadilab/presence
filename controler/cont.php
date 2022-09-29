<?php

include 'config.php';
$table = $_POST['table'];

$ft = "";
if(isset($_POST['date']) && $_POST['date'] != 'NaN-NaN-NaN')
{
   $ft = "WHERE checkindate = '".$_POST['date']."' AND time_out is  NULL"; 
}
$req = "SELECT * FROM $table ".$ft;

$result = $conn->query($req);
if ($result->num_rows > 0)
{
    echo $result->num_rows;
}else{
    echo 0;
}

?>