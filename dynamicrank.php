<?php

		
		
include 'databaseconnection.php';
$query3 = $conn->prepare("Update `candidates2` set candpoint='0'");
$query3->execute();
try{

$query = $conn->prepare("SELECT * FROM `auto_point`");
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);
	$langpo = $result["languagenopoint"];
	$licpo = $result["dlicencepoint"];
	$youngpo = $result["youngtalentpoint"];
	$maritalpo = $result["maritalstatuspoint"];
	$masterpo = $result["masterpoint"];
	$disablepo = $result["disabilitypoint"];



}catch (PDOException $e) {
		echo 'Failed Register.';
        echo 'PDO Exception: ' . $e->getMessage();
        exit();
}


$query2 = $conn->prepare("SELECT * FROM `candidates2`");
$query2->execute();


while($result2 = $query2->fetch(PDO::FETCH_ASSOC)){
	$candpoint="0";
	$id = $result2["candidateID"];
	$lname = $result2["lastName"];
	$languagenum = $result2["languagenum"];
	$dlicenc = $result2["dlicenc"];
	$maritalstat = $result2["maritalstat"];
	$master = $result2["master_educ"];
	$disable = $result2["disability"];
	$age = $result2["age"];
	$candpoint = $result2["candpoint"];
	

	if($languagenum >= "2"){
		$candpoint=$candpoint+$langpo;
	}
	
	if($dlicenc == 1){
		$candpoint=$candpoint+$licpo;
	}
	
	if($disable == 1){
		$candpoint=$candpoint+$disablepo;
	}
	
	if($master != "null" ){
		$candpoint=$candpoint+$masterpo;
	}
	
	if($maritalstat == "single"){
		$candpoint=$candpoint+$maritalpo;
	}
	
	if($age <= "25"){
		$candpoint=$candpoint+$youngpo;
	}


$query3 = $conn->prepare("Update `candidates2` set candpoint='$candpoint' where candidateID='$id'");
$query3->execute();
$candpoint="0";
}


$query7 = $conn->prepare("SELECT * FROM `candidates2` order by candpoint DESC");
$query7->execute();
	$kopt="<table style='width:98%' id='empTable'>";
	$kopt.="<tr>";
	$kopt.="<th width='7%'><u>ID</u></th>";
	$kopt.="<th width='10%'><u>Firstname</u></th>";
	$kopt.="<th width='10%'><u>Lastname</u></th>";
	$kopt.="<th width='5%'><u>Age</u></th>";
	$kopt.="<th width='15%'><u>City</u></th>";
	$kopt.="<th width='40%'><u>University</u></th>";
	$kopt.="<th width='10%'><u>Candidate Point</u></th>";
	$kopt .="</tr>";	
	$kopt .="</table>";	
	echo $kopt;

while($result7 = $query7->fetch(PDO::FETCH_ASSOC)){
	$id2 = $result7["candidateID"];
	$fname2 = $result7["firstName"];
	$lname2 = $result7["lastName"];
	$age2 = $result7["age"];
	$city2 = $result7["city"];
	$educInfo2 = $result7["university"];
	$candpoint2=$result7["candpoint"];		
	
	$opt="<table style='width:98%' id='myTable'>";
	$opt.="<tr>";
	$opt .="<th width='7%'>{$result7['candidateID']}</th>";
	$opt .="<th width='10%'>{$result7["firstName"]}</th>";
	$opt .="<th width='10%'>{$result7["lastName"]}</th>";
	$opt .="<th width='5%'>{$result7["age"]}</th>";
	$opt .="<th width='15%'>{$result7["city"]}</th>";
	$opt .="<th width='40%'>{$result7["university"]}</th>";
	$opt .="<th width='10%'>{$result7["candpoint"]}</th>";
	$opt .="</tr>";	
	$opt .="</table>";	
	echo $opt;
}

	

?>

