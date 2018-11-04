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
        <h2>Automatic Point System Settings Page</h2>
		<p>Point Change Status</p>
<?php
$language=$_POST['language'];
$dlicence=$_POST['dlicence'];
$young=$_POST['young'];
$marital=$_POST['marital'];
$master=$_POST['master'];
$disable=$_POST['disable'];
$idno=1;

include 'databaseconnection.php';

try{
$query = $conn->prepare("Update `auto_point` set languagenopoint='$language',dlicencepoint='$dlicence',youngtalentpoint='$young',maritalstatuspoint='$marital',masterpoint='$master',disabilitypoint='$disable' where autid='$idno'");
$res = $query->execute();
?>
<p>Dear Admin you succesfully change auto point system settings.</p>
<?php
}catch (PDOException $e) {
		echo 'Failed Register.';
        echo 'PDO Exception: ' . $e->getMessage();
        exit();
}


?>
	
        
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
   <p>You logged in as an Admin</p>
  
  
  </div>
  
  



</body></html>