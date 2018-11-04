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
	
        <h2>Introduction</h2>
		<p>Online Recruitment Application there are two types of candidate evaluation point.
		First one is given by the admin by looking candidate CV and motivation. 
		Second one is created automatically with using basic algorithm. 
		Candidate evaluation point ranking system takes candidate’s some of information. 
		These informations are driving license, marital status, foreign language number and age. 
		In the system if our candidate age is below 25 system assign this candidate as a young talent 
		and candidate evaluation point will be increase with using young talent point which can be define
		by admin with using point settings section.
		Solution Approach should be divided into two sections as front-end and back-end sites.</p> 
        <p>Most of the companies’ recruitment of new employee is real challenge. 
		Human Resources department has massive workload on this problem. 
		When I think my observations in Vodafone, I can find proper solution for this problem.
		In this project I will focus on recruitment applications and I aim to improve these 
		applications to reduce workload of Human Resources departments. </p>
		<p> When we consider recruitment process, main problem occurs investigating candidate’s CV.
		Because there are a lot of position and too many candidates in sample company. 
		This project’s aim is develop a website which store candidate CV’s online and Human Resources 
		admin easily search and eliminate unnecessary information on CV’s. </p>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website<br>

  <p>You logged in as a Candidate</p>
  

   </div>
  



</body></html>