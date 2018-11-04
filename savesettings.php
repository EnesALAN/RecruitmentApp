<?php
include databaseconnection.php;


$id = $_POST['id'];
$point = "5";
echo $id;

$query = $conn->prepare("Update `job_enrollment` set candidateJobPoint='$point' where cand_id='$id'");
$res = $query->execute();

echo "Success";
?>