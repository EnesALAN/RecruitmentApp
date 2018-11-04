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
        <h1>Transaction Result</h1>

	
<?php

include 'databaseconnection.php';

$query = $conn->prepare("SELECT MAX(candidateID) as max_id FROM `candidates2` group by candidateID");
$query->execute();


while($result = $query->fetch(PDO::FETCH_ASSOC)){
	$maxid = $result["max_id"];

}

$candidateId=$maxid+1;
$name="John";
$surname="Doe";
$city="";
$email="";
$tel="";
$bday="";
$university2="YÜZÜNCÜ YIL ÜNİVERSİTESİ";
$langno=1;
$disable=0;
$expno=1;
$skillno=1;
$licence=0;
$marital="";
$master="";


$age=7;
//yaşı ve soyadı ilk şifre temp
$password="example";

try{
$query5 = $conn->prepare("INSERT INTO Candidates2 values('$candidateId','$name','$surname','$age','$city','$university2','$langno','$licence','$marital','0','$email','$tel','$bday','$master','$disable')");
$res = $query5->execute();

$query10 = $conn->prepare("INSERT INTO CandLogin values('$candidateId','$password')");
$res = $query10->execute();
}catch (PDOException $e) {
		echo 'Failed.';
        echo 'PDO Exception: ' . $e->getMessage();
}


	if($langno==1){
		$lang1="";
		$lang1level="";
		$query7 = $conn->prepare("INSERT INTO candidate_languages(cand_id,lang1,lang1level) values('$candidateId','$lang1','$lang1level')");
		$query7->execute();
	}
	
		if($expno==1){
		$exp1="";
		$query9 = $conn->prepare("INSERT INTO candidate_experience(cand_id,exp1) values('$candidateId','$exp1')");
		$query9->execute();
	}
	
		if($skillno==1){
		$ski1="";
		$query12 = $conn->prepare("INSERT INTO candidate_skills(cand_id,skill1) values('$candidateId','$ski1')");
		$query12->execute();
	}
	
	





?>


			<p>Blank Candidate Profile Succesfully Created</p>
	
    
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
  
  </div>
  
  



</body></html>