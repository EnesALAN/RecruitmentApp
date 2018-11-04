<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Main Page</title>
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

        <h2>Software Usage Information</h2>
        <p>Most of the companies’ recruitment of new employee is real challenge. 
		Human Resources department has massive workload on this problem. 
		When I think my observations in Vodafone, I can find proper solution for this problem.
		In this project I will focus on recruitment applications and I aim to improve these 
		applications to reduce workload of Human Resources departments. </p>
		<p>   I would like to work on Online Recruitment Application when considering my experience,
		I can easily tell which problems needs to be solved first recruitment phase. Main problem 
		occurs investigating candidate’s CV. Because there are lot of position and too many candidates 
		in sample company. My aim is develop a website which store candidate CV’s online and Human Resources 
		admin easily search and eliminate unnecessary information on CV’s. This website enhanced by using different
		approaches to increase effectiveness.</p>		
		<p> The system is a Web-based application; therefore, 
		I am using HTML and CSS to design the website and make it functional. For the back-end development, 
		I am using MySQL and PH. Second semester I will use Java, the reason I chose Java to develop the engine 
		was due to the available libraries in Java. However, instead of using libraries, 
		I decided to develop the necessary algorithms myself on second semester.</p>
      </div>

     
    
     <div id="testenter"></div>
    
  <div class="clear"></div>
  
  
  <div id="footer" name="footeradmin">Candidate Picker Website</a><br>
  
   <p>You logged in as an Admin</p>
  
  </div>
  
  



</body></html>