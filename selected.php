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
			 header("location:adminlogin.php");
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
        <li><a href="mainpage.php">Home</a></li>
		<li class='active has-sub'><a href='#'><span>Candidate Settings</span></a>
		<ul>
         <li class='has-sub'><a href='selcan.php'><span>Select Candidate</span></a></li>
         <li class='has-sub'><a href='addcandidate2.php'><span>Add New Candidate</span></a></li>
		<li class='has-sub'><a href='deletecandidate.php'><span>Delete Candidate</span></a></li>
		<li class='has-sub'><a href='updatecandidatestatus.php'><span>Update Candidate Status</span></a></li>
		</ul>
		</li>
		<li><a href="searchcandidate.php">Search Candidate Information</a></li>
		<li><a href="addnewjob.php">Add New Job</a></li>
		<li><a href="newse.php">Export Table</a></li>
		<li><a href="listappliedjobs.php">List Applied Jobs</a></li>
		<li><a href="candidateranking.php">Candidate Ranking</a></li>
		<li><a href="pointsettings.php">Point Settings</a></li>
		<li><a href="logout.php">Log out</a></li>
      </ul>
	  </div>
    </div>
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
        <h2>SELECTED CANDIDATE</h2>
		<div class="previous"><a href="selcan.php"><p style="margin:3px;"> Previous Page</p>  </a></div>
		<p>Selected Candidate information is shown below.</p>
		
		<?php

$choice= $_POST['dynamic_data'];
include 'databaseconnection.php';
$query = $conn->prepare("SELECT * FROM `candidates2` WHERE candidateID='$choice'");
$query->execute();


while($result = $query->fetch(PDO::FETCH_ASSOC)){
	$id = $result["candidateID"];
	$fname = $result["firstName"];
	$lname = $result["lastName"];
	$age = $result["age"];
	$city = $result["city"];
	$educInfo = $result["university"];
	
	//echo $result["firstName"].",Last Name".$result["lastName"];
	
?>
<table style="width:98%">
  <tr>
	<th><u>ID</u></th>
    <th><u>Firstname</u></th>
    <th><u>Lastname</u></th> 
	<th><u>Age</u></th>
	<th><u>City</u></th>
	<th><u>Candidate Education Information</u></th>
  </tr>
  <tr>
	<th><?php echo $id ?></th>
    <th><?php echo $fname ?></th>
    <th><?php echo $lname ?></th>
	<th><?php echo $age ?></th>
	<th><?php echo $city ?></th>
    <th><?php echo $educInfo ?></th>
  </tr>
 
</table>
<?php	
}
?>

		
        <p> </p>
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
   <p>You logged in as an Admin</p>
  
  </div>
  
  



</body></html>