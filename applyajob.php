<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/
jquery.min.js"></script>
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
<script type="text/javascript">
	


var doStuff = function () {
	$.ajax({
	success : function(){
  $('#load').load("fetch2.php").fadeIn("slow");
   setInterval(doStuff, 60000);
           },
    });
};
doStuff();
//$(document).ready(doStuff());
</script>

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
	   	<li><a href="adminlogin.php">Log out</a></li>>
      </ul>
	  </div>
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
	 <h2>Apply Part</h2>
        <p>In this section, you can choose offered jobs and give small explanation why you choose this. </p>

		<form action="applied.php" method="POST">	
		
		<p>Please Choose a Job:<p>

			<div id="load">


			</div>

	
 
		<br>


	
		<p  style="margin-top:-10px; !important;">Why you choose this job:</p>
		<p><textarea name="jobReason" cols="55" rows="10" ></textarea><br>
  <input type="submit" name="submit" value="Submit" class="jobbutton" style="margin-left=-5px;"/>
</form>

       


    <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
   <p>You logged in as a Candidate</p>
  
  </div>
  
  



</body></html>