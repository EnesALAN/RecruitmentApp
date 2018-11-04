<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Candidate Picker</title>
<link href="css/style.css" rel="stylesheet" type="text/css">

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
	
        <h2>Transaction Result</h2>
		<?php

			session_start();
			$candId=$_SESSION['name'];
			$path="userimages/".$candId.".jpg";
			//$name=mysql_real_escape_string($_FILES["image"]["name"]);

			include 'databaseconnection.php';
			$query = $conn->prepare("SELECT * FROM `user_image` WHERE imgname='$candId'");
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$imagename = $result["imgname"];
			if($imagename!=$candId){
			try{
				
			$query2 = $conn->prepare("INSERT INTO user_image values(DEFAULT,'$candId','$path')");
			$res = $query2->execute();
			echo "Upload Successfull";
				
			}catch (PDOException $e) {
					echo 'Failed.';
					echo 'PDO Exception: ' . $e->getMessage();
					exit();
			}
			}
			

			
?>
		

	






      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website<br>

  <p>You logged in as a Candidate</p>
  

   </div>
  



</body></html>