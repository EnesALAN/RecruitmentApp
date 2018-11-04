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
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
	<?php
	session_start();
	$candId=$_SESSION['name'];
	
	?>
         <h2>Candidate Information Confirmation</h2>
		<p>Dear Candidate you can see registered information of yours, after the auto fill transaction.</p>
		
		<?php
			$fileName = $_POST['fName'];
			//$cvtype = $_POST['cvtype'];

			
			$name="cansin.txt";
			$time_start = microtime(true);
			$pictureName = "cve.png";
			require_once("Java.inc");
			$demo = new java("javabridgedemo.JavaBridgeDemo");
			 
			$ocrPart = new java("javabridgedemo.objectCharacterRecognition");
			$folderRead = new java("javabridgedemo.folderRead");

			
			$ocrPart->ocrSide($fileName);
			//$docname=ocrPart->getName($filename);
			$docname=substr($fileName,0,-3);
			$docname=$docname."txt";
			$folderRead->filesInTheFolder($docname,$candId);
			
			
			
			?>
			<p>
			<?php echo "Execution Time : ".$execution_time = (microtime(true) - $time_start);?></p>

		<p>
	<?php

		include 'databaseconnection.php';

		
		
		$query = $conn->prepare("SELECT * FROM `candidate_skills` WHERE cand_id='$candId'");
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_ASSOC)){
		$skill1 = $result["skill1"];
		$skill2 = $result["skill2"];
		$skill3 = $result["skill3"];
		
		}
		
		$query7 = $conn->prepare("SELECT * FROM `candidate_experience` WHERE cand_id='$candId'");
		$query7->execute();
		
		while($result7 = $query7->fetch(PDO::FETCH_ASSOC)){
		$exp1 = $result7["exp1"];
		$exp2 = $result7["exp2"];
		$exp3 = $result7["exp3"];
		
		
		}
		
		
		$query8 = $conn->prepare("SELECT * FROM `candidate_languages` WHERE cand_id='$candId'");
		$query8->execute();
		
		while($result8 = $query8->fetch(PDO::FETCH_ASSOC)){
		$lang1 = $result8["lang1"];
		$lang2 = $result8["lang2"];
		$lang3 = $result8["lang3"];

		}
		

		
		
		
		
		
		$query2 = $conn->prepare("SELECT * FROM `candidates2` WHERE candidateID='$candId'");
		$query2->execute();
		
		
		
		
		while($result2 = $query2->fetch(PDO::FETCH_ASSOC)){

			$fname = $result2["firstName"];
			$lname = $result2["lastName"];
			$email = $result2["email"];
			$city = $result2["city"];
			$educInfo = $result2["university"];
			$telno = $result2["phone_no"];
			$bday = $result2["bday"];
			$dlicence = $result2["dlicenc"];
			$langno = $result2["languagenum"];
			$disable = $result2["disability"];
			$master = $result2["master_educ"];
			$marital = $result2["maritalstat"];

		}
		?>

		First name : 
		<?php echo "<strong>".$fname."</strong>"?><br>
		Last name :
		<?php echo "<strong>".$lname."</strong>"?><br>
		City :
		<?php echo "<strong>".$city."</strong>"?><br>
		E-mail :
		<?php echo "<strong>".$email."</strong>"?><br>
		Phone Number :
		<?php echo "<strong>".$telno."</strong>"?><br>

		Birthday : 
		<?php echo "<strong>".$bday."</strong>"?><br>
		Foreign Languages:<br>
		<?php 
		if(!empty($lang1) && $lang1 !="null"){
			echo "<strong>".$lang1."</strong>"
			?>
			<br>
			<?php
		}
		?>
		<?php 
		if(!empty($lang2) && $lang2 !="null"){
			echo "<strong>".$lang2."</strong>"
			?>
			<br>
			<?php
		}
		?>
		<?php 
		if(!empty($lang3) && $lang3 !="null"){
			echo "<strong>".$lang3."</strong>"
			?>
			<br>
			<?php
		}
		?>
		Experience:<br>
				<?php 
		if(!empty($exp1) && $exp1 !="null"){
			echo "<strong>".$exp1."</strong>"
			?>
			<br>
			<?php
		}
		?>
		<?php 
		if(!empty($exp2) && $exp2 !="null"){
			echo "<strong>".$exp2."</strong>"
			?>
			<br>
			<?php
		}
		?>
		<?php 
		if(!empty($exp3) && $exp3 !="null"){
			echo "<strong>".$exp3."</strong>"
			?>
			<br>
			<?php
		}
		?>
		
		Skills:<br>
		<?php 
		if(!empty($skill1) && $skill1 !="null"){
			echo "<strong>".$skill1."</strong>"
			?>
			<br>
			<?php
		}
		?>
		<?php 
		if(!empty($skill2) && $skill2 !="null"){
			echo "<strong>".$skill2."</strong>"
			?>
			<br>
			<?php
		}
		?>
		<?php 
		if(!empty($skill3) && $skill3 !="null"){
			echo "<strong>".$skill3."</strong>"
			?>
			<br>
			<?php
		}
		?>
		
		
		Driving Licence:
		<?php
		if($dlicence==1){
			
		echo "Yes";	
		}else{
			echo "No";
		}
		
		?>
		<br>

		Disability:
		<?php
		if($disable==1){
			
		echo "Yes";	
		}else{
			echo "No";
		}
		
		?>
		

<br>
		Master Education:
		
		<?php echo "<strong>".$master."</strong>";?><br>
		Marital Status:
		<?php echo $marital;?>
		<br>
		University:

		<?php echo "<strong>".$educInfo."</strong>"?><br>

  
</p>
       <p>If there is a incorrect information you can go <a href="candidatesetting.php">Candidate Settings</a> Page and Update.</p> 
           <hr>
		   
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
   <p>You logged in as a Candidate</p>
  
  
  </div>
  
  



</body></html>