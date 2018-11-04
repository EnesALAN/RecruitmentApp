<?php
 
//set random name for the image, used time() for uniqueness
 session_start();
$candId=$_SESSION['name'];
$filename =  $candId . '.jpg';
//$filename =  time() . '.jpg';
$filepath = 'userimages/';
 
move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
 
echo $filepath.$filename;
?>