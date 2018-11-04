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
        <h1>Transaction Result</h1>

	
<?php
		 session_start();
		$candId=$_SESSION['name'];
		$skillnom=$_SESSION['skillnum'];
		$expnom=$_SESSION['expnum'];
include 'databaseconnection.php';
$candidateId=$candId;
$name=$_POST['fName'];
$surname=$_POST['lName'];
$city=$_POST['city'];
$email=$_POST['email'];
$tel=$_POST['telNo'];
$bday=$_POST['bday'];
$university=$_POST['universityvalue'];
$langno=$_POST['langno'];
$licence=$_POST['licence'];
$marital=$_POST['marital'];
$master=$_POST['master'];
$disable=$_POST['disable'];
$expno=$_POST['exp'];
$skillno=$_POST['skill'];
$today = date("Ymd");   
$todayyear= substr($today,0,-4);
$bdayyear = substr($bday,0, -6);
$age=$todayyear-$bdayyear;

	
	$sql="UPDATE Candidates2 SET ";
	if(empty($_POST['fName'])){
		
	}else{
		$sql.="firstName='$name',";
	}
	if(empty($surname)){
		
	}else{
		$sql.="lastName='$surname',";
	}
	if(empty($city)){
		
	}else{
		$sql.="city='$city',";
	}
	if(empty($email)){
		
	}else{
		$sql.="email='$email',";
	}
	if(empty($email)){
		
	}else{
		$sql.="phone_no='$tel',";
	}
	
	
	
	$sql.="age='$age', university='$university',languagenum='$langno',dlicenc='$licence',maritalstat='$marital',bday='$bday',master_educ='$master',disability='$disable' where candidateID = '$candId'";

try{
$query5 = $conn->prepare($sql);
$res = $query5->execute();

}catch (PDOException $e) {
		echo 'Failed.';
        echo 'PDO Exception: ' . $e->getMessage();
}

	if(empty($_POST['mytext'])){
	}else{
	if($langno==1){
		$lang1=$_POST['mytext'];
		$lang1level=$_POST['level'];
		
		$query7 = $conn->prepare("UPDATE candidate_languages SET lang1='$lang1', lang1level='$lang1level', lang2='null', lang2level='null',lang3='null', lang3level='null' where cand_id='$candId'");
		$query7->execute();
	}else if($langno==2){
		$lang1=$_POST['mytext'];
		$lang2=$_POST['mytext1'];
		$lang1level=$_POST['level'];
		$lang2level=$_POST['level1'];
		
		$query8 = $conn->prepare("UPDATE candidate_languages SET lang1='$lang1', lang1level='$lang1level', lang2='$lang2', lang2level='$lang2level',lang3='null', lang3level='null' where cand_id='$candId'");
		$query8->execute();
	}else if($langno==3){
		$lang1=$_POST['mytext'];
		$lang2=$_POST['mytext1'];
		$lang3=$_POST['mytext2'];
		$lang1level=$_POST['level'];
		$lang2level=$_POST['level1'];
		$lang3level=$_POST['level2'];
		$query8 = $conn->prepare("UPDATE candidate_languages SET lang1='$lang1', lang1level='$lang1level', lang2='$lang2', lang2level='$lang2level',lang3='$lang3', lang3level='$lang3level' where cand_id='$candId'");
		$res=$query8->execute();
		
	}
	}
	if($expnom != $expno){
		if($expno==1){
		$exp1=$_POST['myexp1'];
		$exp2="";
		$exp3="";
		$query9 = $conn->prepare("UPDATE candidate_experience SET exp1='$exp1',exp2='$exp2',exp3='$exp3' where cand_id='$candId'");
		$query9->execute();
	}else if($expno==2){
		$exp1=$_POST['myexp1'];
		$exp2=$_POST['myexp2'];
		$exp3="";
		$query10 = $conn->prepare("UPDATE candidate_experience SET exp1='$exp1',exp2='$exp2',exp3='$exp3' where cand_id='$candId'");
		$query10->execute();
	}else if($expno==3){
		$exp1=$_POST['myexp1'];
		$exp2=$_POST['myexp2'];
		$exp3=$_POST['myexp3'];
		$query11 = $conn->prepare("UPDATE candidate_experience SET exp1='$exp1',exp2='$exp2',exp3='$exp3' where cand_id='$candId'");
		$query11->execute();
		
	}
	}
	if($skillnom != $skillno){
		if($skillno==1){
		$ski1=$_POST['skill1'];
		$ski2="";
		$ski3="";
		$query12 = $conn->prepare("UPDATE candidate_skills SET skill1='$ski1',skill2='$ski2',skill3='$ski3' where cand_id='$candId'");
		$query12->execute();
	}else if($skillno==2){
		$ski1=$_POST['skill1'];
		$ski2=$_POST['skill2'];
				$ski3="";
		$query13 = $conn->prepare("UPDATE candidate_skills SET skill1='$ski1',skill2='$ski2',skill3='$ski3' where cand_id='$candId'");
		$query13->execute();
	}else if($skillno==3){
		$ski1=$_POST['skill1'];
		$ski2=$_POST['skill2'];
		$ski3=$_POST['skill3'];
		$query14 = $conn->prepare("UPDATE candidate_skills SET skill1='$ski1',skill2='$ski2',skill3='$ski3' where cand_id='$candId'");
		$query14->execute();
		
	}
	}




?>


			<p>Candidate  <?php echo $name.' '.$surname ?> Succesfully Updated</p>
	
    
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
  
  </div>
  
  



</body></html>