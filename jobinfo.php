<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Candidate Picker</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<?php
		 session_start();
		if(empty($_SESSION['name'])) {
			 echo 'Set and not empty, and no undefined index error!';
			 header("location:candidateloginpage.php");
		}
   


?>

</head>
<body>
<div id="wrapper"> 
  
  <div id="header">
  
  <div class="banner_img">
    <h1>Candidate Picker Program</h1>
    <p>Choose the best candidate</p>
    </div>

	</div>
	
	<div class="navigation">
	<div id='cssmenu'>
      <ul>
        <li><a href="candlogin.php">Home</a></li>
        <li><a href="jobposting.php">Job Posting</a></li>
        <li><a href="applyajob.php">Apply for A Job</a></li>
		<li><a href="uploadcv.php">Upload CV</a></li>
		<li><a href="cvphoto.php">Upload CV by taking photo</a></li>
		<li><a href="candidatesetting.php">Candidate Settings</a></li>
		<li><a href="candstatus.php">Candidate Apply Status</a></li>
	   	<li><a href="adminlogin.php">Log out</a></li>
      </ul>
	  </div>
    </div>
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
        <h2>Listed Job</h2>
		<?php

$choice= $_POST['dynamic_data'];
include 'databaseconnection.php';
$query = $conn->prepare("SELECT * FROM `Jobs` WHERE jobId='$choice'");
$query->execute();


while($result = $query->fetch(PDO::FETCH_ASSOC)){
	$id = $result["jobId"];
	$jname = $result["jobName"];
	$jobDesc = $result["jobDescription"];
	
	
	//echo $result["firstName"].",Last Name".$result["lastName"];
	
?>
<table style="width:100%" align="center">
  <tr>
	<th>ID</th>
    <th>Job name</th>
   

  </tr>
  <tr>
	<th><?php echo $id ?></th>
    <th><?php echo $jname ?></th>
   
	
  </tr>
 
</table>

<h3>Job Description</h3>
<p><?php echo $jobDesc ?><p>
<?php	
}
?>
      
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
   <p>You logged in as a Candidate</p>
  
  </div>
  
  



</body></html>