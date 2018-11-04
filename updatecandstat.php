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
		<li><a href="searchcandidate.php">Search University Information</a></li>
		<li><a href="addnewjob.php">Add New Job</a></li>
		<li><a href="listappliedjobs.php">List Applied Jobs</a></li>
		<li><a href="candidateranking.php">Candidate Ranking</a></li>
		<li><a href="pointsettings.php">Point Settings</a></li>
		<li><a href="adminlogin.php">Log out</a></li>
      </ul>
	  </div>
    </div>
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
        <h2>UPDATE CANDIDATE STATUS</h2>
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
	//session start candid
	$_SESSION['candid'] = $id;
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
        <p>This candidate applied these jobs</p>
<table style="width:98%">
  <tr>
	<th width="8%"><u>Job ID</u></th>
    <th width="20%"><u>Job Name</u></th>
    <th width="20%"><u>Status</u></th>
	<th width="20%"><u>Select Status</u></th>
	<th width="15%"><u>Change Status</u></th> 	
  </tr>
  
  </table>
		<?php
		$query2 = $conn->prepare("SELECT * FROM `job_enrollment` WHERE cand_id='$id'");
		$query2->execute();
		while($result2 = $query2->fetch(PDO::FETCH_ASSOC)){
		$jobid=$result2["job_id"];
		$status = $result2["acceptance_status"];
		$query3 = $conn->prepare("SELECT * FROM `jobs` WHERE jobId='$jobid'");
		$query3->execute();
		$result3 = $query3->fetch(PDO::FETCH_ASSOC);
		$jobname=$result3["jobName"];
		
		
		?>

<table style="width:98%">
  <tr>
  <form action="stat.php" method="POST">
	<td width="8%"><input name="id" type="hidden" value="<?php echo $jobid ?>"><?php echo $jobid ?></td>
	<td width="20%"><input name="jobname" type="hidden" value="<?php echo $jobname ?>"><?php echo $jobname ?></td>
	<td width="20%"><input name="status" type="hidden" value="<?php echo $status ?>"><?php echo $status ?></td>
	
	
	<td width="20%">
	<select name="changed" style= " margin-left:20px; width: 20em; ">
	<option value=''selected>
	Select a Status
	</option>
	<option value="Analyzing">
	Analyzing
	</option>
	<option value="Accepted">
	Accepted
	</option>
	<option value="Rejected">
	Rejected
	</option>
	
	</td>
	<td width="15%"><input type="submit" name="submit" value="Change" style= " margin-left:30px; "/></form></td>
  </tr>
 
</table>
<?php	
}
?>
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
   <p>You logged in as an Admin</p>
  
  </div>
  
  



</body></html>