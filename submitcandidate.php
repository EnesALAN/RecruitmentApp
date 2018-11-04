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
$candidateId=$_POST['candidateId'];
$name=$_POST['fName'];
$surname=$_POST['lName'];
$city=$_POST['city'];
$email=$_POST['email'];
$tel=$_POST['telNo'];
$bday=$_POST['bday'];
$university2=$_POST['universityvalue'];
$langno=$_POST['langno'];
$disable=$_POST['disable'];
$expno=$_POST['exp'];
$skillno=$_POST['skill'];
$licence=$_POST['licence'];
$marital=$_POST['marital'];
$master=$_POST['master'];

$today = date("Ymd");   
$todayyear= substr($today,0,-4);
$bdayyear = substr($bday,0, -6);
$age=$todayyear-$bdayyear;
//yaşı ve soyadı ilk şifre temp
$password=$surname.$age;

try{
$query5 = $conn->prepare("INSERT INTO Candidates2 values('$candidateId','$name','$surname','$age','$city','$university2','$langno','$licence','$marital','0','$email','$tel','$bday','$master','$disable')");
$res = $query5->execute();

$query9 = $conn->prepare("INSERT INTO CandLogin values('$candidateId','$password')");
$res = $query9->execute();
}catch (PDOException $e) {
		echo 'Failed.';
        echo 'PDO Exception: ' . $e->getMessage();
}


	if($langno==1){
		$lang1=$_POST['mytext'];
		$lang1level=$_POST['level'];
		$query7 = $conn->prepare("INSERT INTO candidate_languages(cand_id,lang1,lang1level) values('$candidateId','$lang1','$lang1level')");
		$query7->execute();
	}else if($langno==2){
		$lang1=$_POST['mytext'];
		$lang2=$_POST['mytext1'];
		$lang1level=$_POST['level'];
		$lang2level=$_POST['level1'];
		$query8 = $conn->prepare("INSERT INTO candidate_languages(cand_id,lang1,lang1level,lang2,lang2level) values('$candidateId','$lang1','$lang1level','$lang2','$lang2level')");
		$query8->execute();
	}else if($langno==3){
		$lang1=$_POST['mytext'];
		$lang2=$_POST['mytext1'];
		$lang3=$_POST['mytext2'];
		$lang1level=$_POST['level'];
		$lang2level=$_POST['level1'];
		$lang3level=$_POST['level2'];
		$query8 = $conn->prepare("INSERT INTO candidate_languages(cand_id,lang1,lang1level,lang2,lang2level,lang3,lang3level) values('$candidateId','$lang1','$lang1level','$lang2','$lang2level','$lang3','$lang3level')");
		$res=$query8->execute();
		
	}
	
		if($expno==1){
		$exp1=$_POST['myexp1'];
		$query91 = $conn->prepare("INSERT INTO candidate_experience(cand_id,exp1) values('$candidateId','$exp1')");
		$query91->execute();
	}else if($expno==2){
		$exp1=$_POST['myexp1'];
		$exp2=$_POST['myexp2'];
		$query10 = $conn->prepare("INSERT INTO candidate_experience(cand_id,exp1,exp2) values('$candidateId','$exp1','$exp2')");
		$query10->execute();
	}else if($expno==3){
		$exp1=$_POST['myexp1'];
		$exp2=$_POST['myexp2'];
		$exp3=$_POST['myexp3'];
		$query11 = $conn->prepare("INSERT INTO candidate_experience(cand_id,exp1,exp2,exp3) values('$candidateId','$exp1','$exp2','$exp3')");
		$query11->execute();
		
	}
	
		if($skillno==1){
		$ski1=$_POST['skill1'];
		$query12 = $conn->prepare("INSERT INTO candidate_skills(cand_id,skill1) values('$candidateId','$ski1')");
		$query12->execute();
	}else if($skillno==2){
		$ski1=$_POST['skill1'];
		$ski2=$_POST['skill2'];
		$query13 = $conn->prepare("INSERT INTO candidate_skills(cand_id,skill1,skill2) values('$candidateId','$ski1','$ski2')");
		$query13->execute();
	}else if($skillno==3){
		$ski1=$_POST['skill1'];
		$ski2=$_POST['skill2'];
		$ski3=$_POST['skill3'];
		$query14 = $conn->prepare("INSERT INTO candidate_skills(cand_id,skill1,skill2,skill3) values('$candidateId','$ski1','$ski2','$ski3')");
		$query14->execute();
		
	}
	
	





?>


			<p>Candidate  <?php echo $name.' '.$surname ?> Succesfully Added</p>
	
    
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
  
  </div>
  
  



</body></html>