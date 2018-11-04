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
        <h2>Listed Jobs</h2>
		<p>You can choose job title and see description</p>
    	<?php
	
	
	include 'databaseconnection.php';
	$query = $conn->prepare("SELECT * FROM `Jobs`");
	$query->execute();
	

	?>
	<form action="jobinfo.php" method="post">
	<select name="dynamic_data">
	<option value=''selected>
	Select a Job
	</option>
	<?php
	$i=0;
		while($result = $query->fetch(PDO::FETCH_ASSOC)){
			?>
	<option value="<?=$result['jobId'];?>">
	
	<?=$result['jobName'];?>
	
	
	
	</option>
	
	<?php
	$i++;
		}
		?>
		</select>
	<input type="submit" name="submit" value="Submit"/>
</form>
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
   <p>You logged in as a Candidate</p>
  </div>
  
  



</body></html>