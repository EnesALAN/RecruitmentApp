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
	  <?php
	  include 'databaseconnection.php';
	  $choice= $_POST['listedjob'];
	  $query2 = $conn->prepare("SELECT * FROM `jobs` where jobId='$choice'");
	$query2->execute();
	$result = $query2->fetch(PDO::FETCH_ASSOC);
	$jobName = $result["jobName"];
	  
	  
	  ?>
		<h2>Now Listing Candidates for Job:</h2>
        <h2><?php echo $jobName ?></h2>
		<p>This section is to view candidates who apply selected job.<br> 
		By using this section admin can also change candidate points to clicking submit button.</p>
		

<table style="width:98%">
  
  <tr>
    <th width="5%">ID</th>
	<th width="65%">Description</th>
	<th width="5%">Current Candidate Point</th>
	<th width="15%">Enter New Candidate Point</th>
	<th width="10%">Change Candidate Point</th>
	<th width="10%">Look Candidate CV</th>
  </tr>

   



		<?php



$query = $conn->prepare("SELECT * FROM `job_enrollment` WHERE job_id='$choice'");
$query->execute();


		$_SESSION['name'] = $choice;
	
 
while($result = $query->fetch(PDO::FETCH_ASSOC)){
	$id = $result["cand_id"];
	$point = $result["candidateJobPoint"];
	$desc = $result["jobDesc"];
	
	$query4 = $conn->prepare("SELECT * FROM `candidates2` WHERE candidateID='$id'");
	$query4->execute();
	
	$result4 = $query4->fetch(PDO::FETCH_ASSOC);
	$fname = $result4["firstName"];
	$lname = $result4["lastName"];
	$directory="testupload/".$fname.$lname.".pdf";
	$lowercasedirectory= strtolower ($directory);
?>
<form action="assignpoint.php" method="POST">
  <tr>
    <td width="5%"><input name="id" type="hidden" value="<?php echo $id ?>"><?php echo $id ?></td>
	<td width="65%"><input name="desc" type="hidden" value="<?php echo $desc ?>"><?php echo $desc ?></td>
    <td width="5%"><input name="point" type="hidden" value="<?php echo $point ?>"><?php echo $point ?></td>
	<td width="15%"><input type="text" name="changed" style= " margin:auto; "></td>
	<th width="10%"><input type="submit" name="submit" value="Change" style= " margin:auto; "/></form></th>
	<th width="10%"><a href="<?php echo $lowercasedirectory ?>" target="_blank">Show Pdf</th>


  </tr>

<?php

}
?>
</table> 

  




        
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
   <p>You logged in as an Admin</p>
  
  </div>
  
  



</body></html>