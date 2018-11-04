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
	   	<li><a href="logout.php">Log out</a></li>
      </ul>
	  </div>
    </div>
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
        <h2>CANDIDATE ACCEPTANCE STATUS</h2>
		<p>Dear Candidate your acceptance information is shown below.</p>
		<?php

		$candId=$_SESSION['name'];

		include 'databaseconnection.php';
		
		$query3 = $conn->prepare("SELECT COUNT(*)'count' FROM `job_enrollment` WHERE cand_id='$candId'");
		$query3->execute();
		
		$result3 = $query3->fetch(PDO::FETCH_ASSOC);
		$countr =$result3["count"];
		?>
		<p>When we look at the your applied records: We have '<?php echo $countr; ?>' saved records. </p>
		
		<?php
		
		$query = $conn->prepare("SELECT * FROM `job_enrollment` WHERE cand_id='$candId'");
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_ASSOC)){
		$id = $result["cand_id"];
		$jobid = $result["job_id"];
		$accepstat = $result["acceptance_status"];
		$accepstat=strtolower($accepstat);
		$status=$accepstat;
		$query2 = $conn->prepare("SELECT * FROM `jobs` WHERE jobId='$jobid'");
		$query2->execute();
		$result2 = $query2->fetch(PDO::FETCH_ASSOC);
		$jobname =$result2["jobName"];
		?>

		<h3 style="margin-left:15px;"><u>For job which name is <?php echo $jobname;?></u></h3>
		
		<?php
		
		if($status=="analyzing"){
			?>
			<p>Now your job application is analyzing by our Human Resources team.Thanks for your patience.</p>
			
			<?php
		}else if($status=="accepted"){
			?>
			<p>Your job application is accepted by our Human Resources team.We will contact you about interview.</p>
			<?php
		}else if($status=="rejected"){
			?>
			<p>Your job application is rejected.Good luck for your job search.</p>
			<?php
		}
		}
		?>

        <p> </p>
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
   <p>You logged in as a Candidate</p>
  
  </div>
  
  



</body></html>