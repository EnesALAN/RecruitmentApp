<html>
<head>

</head>
<body>
<h2>Candidate Information Print Page</h2>


<?php
include 'databaseconnection.php';
$choice= $_POST['login'];
$query2 = $conn->prepare("SELECT * FROM `candidate_languages` WHERE cand_id='$choice'");
$query2->execute();
$result2 = $query2->fetch(PDO::FETCH_ASSOC);
	$lang1 = $result2["lang1"];
	$lang2 = $result2["lang2"];
	$lang3 = $result2["lang3"];

$query = $conn->prepare("SELECT * FROM `candidates2` WHERE candidateID='$choice'");
$query->execute();

	$query4 = $conn->prepare("SELECT * FROM `user_image` where imgname='$choice'");
	$query4->execute();
	
	$result4 = $query4->fetch(PDO::FETCH_ASSOC);
	$path = $result4["image"];

$result = $query->fetch(PDO::FETCH_ASSOC);
	$id = $result["candidateID"];
	$fname = $result["firstName"];
	$lname = $result["lastName"];
	$age = $result["age"];
	$city = $result["city"];
	$educInfo = $result["university"];
	$marital = $result["maritalstat"];
	$dlic = $result["dlicenc"];
	$telno = $result["phone_no"];
	$bday = $result["bday"];
	$master = $result["master_educ"];
	//echo $result["firstName"].",Last Name".$result["lastName"];
	
?>
<img src="<?php echo $path;  ?>" alt="Profile Picture" style="width:120px;height:150px; float:right; ">
ID:<?php echo $id ?><br>
Firstname : <?php echo $fname ?><br>
Lastname : <?php echo $lname ?><br>
Age : <?php echo $age ?><br>
Phone Number : <?php echo $telno ?><br>
<u>Education</u><br>
Bachelor Degree : <?php echo $educInfo ?><br>
Master Degree : <?php echo $master ?><br>
<u>Personal Information</u><br>
City :<?php echo $city ?> <br>
Marital Status:<?php echo $marital ?><br>
Driving Licence :
		<?php
		if($dlic==1){
			
		echo "Yes";	
		}else{
			echo "No";
		}
		
		?>
<br>
Birthday : <?php echo $bday ?><br>
<u>Languages</u><br>
<?php

if($lang1=="null"){
	
}else{
	echo $lang1;?><br><?php
}
if($lang2=="null"){

}else{
	echo $lang2;?><br><?php
}
if($lang3=="null"){

}else{
	echo $lang3;?><br><?php
}
?>
<input type="button"  onClick="window.print()"  value="Print This Page" style="width:180px;position: absolute;  top: 380px;"/>
</body>
</html>