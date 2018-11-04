<!DOCTYPE html>
<html>
<head>
<?php
		 session_start();
		if(empty($_SESSION['name'])) {
			 echo 'Set and not empty, and no undefined index error!';
			 header("location:candidateloginpage.php");
		}
   

		$candId=$_SESSION['name'];

?>
<meta charset="UTF-8">
<title>Candidate Picker</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/candset.css" rel="stylesheet" type="text/css">
<script>
function myFunction(val) {
    var i=1;

	if(val==1){
		my_div.innerHTML=" ";
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext'>     "
		addOption();                              
		
		           
	}
	else if(val==2){
		my_div.innerHTML=" ";
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext'>"
		addOption();
		i++;
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext1'>"
		addOption2();
	}else if(val==3){
		my_div.innerHTML=" ";
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext'>"
		addOption();
		i++;
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext1'>"
		addOption2();
		i++;
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext2'>"
		addOption3();
	}

}

function addOption(){
	my_div.innerHTML = my_div.innerHTML + "<select name='level' style='width:150px; margin-left:13px; border-radius:4px;'><option value='Elemantary'selected>Elemantary</option><option value='intermediate'>Intermediate</option><option value='advanced'>Advanced</option></select><br>" 
	
}
function addOption2(){
	my_div.innerHTML = my_div.innerHTML + "<select name='level1' style='width:150px; margin-left:13px; border-radius:4px;'><option value='Elemantary'selected>Elemantary</option><option value='intermediate'>Intermediate</option><option value='advanced'>Advanced</option></select><br>" 
	
}
function addOption3(){
	my_div.innerHTML = my_div.innerHTML + "<select name='level2' style='width:150px; margin-left:13px; border-radius:4px;'><option value='Elemantary'selected>Elemantary</option><option value='intermediate'>Intermediate</option><option value='advanced'>Advanced</option></select><br>" 
	
}

function myFunction2(val) {
    var i=1;

	if(val==1){
		my_divi.innerHTML=" ";
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp1'>"            
	}
	else if(val==2){
		my_divi.innerHTML=" ";
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp1'><br>"
		i++;
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp2'>"
	}
	else if(val==3){
		my_divi.innerHTML=" ";
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp1'><br>"
		i++;
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp2'><br>"
		i++;
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp3'><br>"
	}

}


function myFunction3(val) {
    var i=1;

	if(val==1){
		my_divid.innerHTML=" ";
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill1'>"            
	}
	else if(val==2){
		my_divid.innerHTML=" ";
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill1'><br>"
		i++;
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill2'>"
	}
	else if(val==3){
		my_divid.innerHTML=" ";
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill1'><br>"
		i++;
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill2'><br>"
		i++;
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill3'><br>"
	}

}

</script>
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
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
        <h2>Candidate Settings</h2>
		<p>In this section, you can see registered information of yours.If there is a incorrect information you can fill the form and submit.</p>
		
		<?php

		include 'databaseconnection.php';
		?>
	 <?php

	$query4 = $conn->prepare("SELECT * FROM `user_image` where imgname='$candId'");
	$query4->execute();
	
	$result4 = $query4->fetch(PDO::FETCH_ASSOC);
	$path = $result4["image"];

	  ?>
<div id="results">
<a style="padding-left:0em;">Profile Picture</a>
<br>
<img src="<?php echo $path;  ?>" alt="Please Add Your Picture" style="width:180px;height:200px;">

		<form action="takeprofilepic.php" method="POST">
		<input type="submit" name="submit" value="Take a New Photo" style="width:10em;margin-left:-3px;"/>
		</form>
		</div>
		<?php
		
		$query = $conn->prepare("SELECT * FROM `universities`");
		$query->execute();
		
		$query2 = $conn->prepare("SELECT * FROM `candidates2` WHERE candidateID='$candId'");
		$query2->execute();

		$query7 = $conn->prepare("SELECT * FROM `candidate_skills` WHERE cand_id=$candId");
		$query7->execute();
		$countskills=0;
		while($result7 = $query7->fetch(PDO::FETCH_ASSOC)){
		$skill1 = $result7["skill1"];
		$skill2 = $result7["skill2"];
		$skill3 = $result7["skill3"];
		if($skill1==""){
		
		}else{
		$countskills++;
		}
				if($skill2==""){
		
		}else{
		$countskills++;
		}
		if($skill3==""){
		
		}else{
		$countskills++;
		}
		

		$_SESSION['skillnum'] = $countskills;
		}
		
		$query8 = $conn->prepare("SELECT * FROM `candidate_experience` WHERE cand_id=$candId");
		$query8->execute();
		$countexp=0;
		while($result8 = $query8->fetch(PDO::FETCH_ASSOC)){
		$exp1 = $result8["exp1"];
		$exp2 = $result8["exp2"];
		$exp3 = $result8["exp3"];
		if($exp1==""){
		
		}else{
		$countexp++;
		}
				if($exp2==""){
		
		}else{
		$countexp++;
		}
		if($exp3==""){
		
		}else{
		$countexp++;
		}
		$_SESSION['expnum'] = $countexp;
		}
		
		while($result = $query2->fetch(PDO::FETCH_ASSOC)){

			$fname = $result["firstName"];
			$lname = $result["lastName"];
			$email = $result["email"];
			$city = $result["city"];
			$educInfo = $result["university"];
			$telno = $result["phone_no"];
			$bday = $result["bday"];
			$dlicence = $result["dlicenc"];
			$langno = $result["languagenum"];
			$disable = $result["disability"];
			$master = $result["master_educ"];
			$marital = $result["maritalstat"];
		}
		?>

		<form action="candidatesettingsubmit.php" method="POST">	

		First name:<br>
		<input type="text" name="fName" placeholder="<?php echo $fname;?>"><br>
		Last name:<br>
		<input type="text" name="lName" placeholder="<?php echo $lname;?>"><br>
		City:<br>
		<input type="text" name="city" placeholder="<?php echo $city;?>"><br>
		E-mail:<br>
		<input type="email" name="email" placeholder="<?php echo $email;?>"><br>
		Phone Number:<br>
		<input type="tel" name="telNo" placeholder="<?php echo $telno;?>"><br>
		<!-- DÜZENLE -->
		Birthday:<br>
		<input type="date" name="bday" max="2000-12-31" min="1970-01-01" placeholder="<?php echo $bday;?>"><br>
		Foreign Language Number:<br>
		<select name="langno" onchange="myFunction(this.value)" style="width:150px; margin-left:13px;">
		<option value='<?php echo $langno;?>'selected>
		<?php echo $langno;?>
		</option>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		</select><br>
		<div id="my_div">
		
		
		</div>
		
		Experience:<br>
		<select name="exp" onchange="myFunction2(this.value)" style="width:150px; margin-left:13px;">
		<option value='<?php echo $countexp; ?>'selected>
		<?php echo $countexp;    ?>
		</option>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		</select><br>
		<div id="my_divi">
		
		
		</div>
		
		Skills:<br>
		<select name="skill" onchange="myFunction3(this.value)" style="width:150px; margin-left:13px;">
		<option value='<?php echo $countskills; ?>'selected>
		<?php echo $countskills;    ?>
		</option>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		</select><br>
		<div id="my_divid">
		
		
		</div>
		
		
		Driving Licence:<br>
		<select name="licence" style="width:150px; margin-left:13px;">
		<option value='<?php echo $dlicence; ?>'selected>
		<?php
		if($dlicence==1){
			
		echo "Yes";	
		}else{
			echo "No";
		}
		
		?>
		
		</option>
		<option value='1'>Yes</option>
		<option value='0'>No</option>
		</select><br>
		
		Disability:<br>
		<select name="disable" style="width:150px; margin-left:13px;">
		<option value='<?php echo $disable; ?>'selected>
		<?php
		if($disable==1){
			
		echo "Yes";	
		}else{
			echo "No";
		}
		
		?>
		
		</option>
		<option value='1'>Yes</option>
		<option value='0'>No</option>
		</select><br>
		Master Education:<br>
		<input type="text" name="master" placeholder="<?php echo $master;?>"><br>
		Marital Status:<br>
		<select name="marital" style="width:150px; margin-left:13px;">
		<option value='<?php echo $marital;?>'selected>
		<?php echo $marital;?>
		</option>
		<option value='single'>Single</option>
		<option value='married'>Married</option>
		<option value='divorced'>Divorced</option>
		</select><br>
		University:<br>
		<select name="universityvalue" style="width:250px; margin-left:13px;">
		<option value='<?php echo $educInfo; ?>' selected>
		<?php echo $educInfo;?>
		</option>
  
  
  <?php
	$i=0;
		while($result = $query->fetch(PDO::FETCH_ASSOC)){
			?>
	<option value="<?=$result['universityName'];?>">
	
	<?=$result['universityName'];?>
	
	</option>
	
	<?php
	$i++;
		}
		?>  
 
</select><br><br>
  <input type="submit" name="submit" value="Submit"/>
</form>
	
        
           <hr>
		   
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
   <p>You logged in as a Candidate</p>
  
  
  </div>
  
  



</body></html>