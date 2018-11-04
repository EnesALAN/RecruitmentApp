		<?php


include 'databaseconnection.php';
$query = $conn->prepare("SELECT * FROM `candidates2` order by candpoint DESC ");
$query->execute();
	$kopt="<table style='width:98%' id='myTable'>";
	$kopt.="<tr>";
	$kopt.="<th width='7%'><u>ID</u></th>";
	$kopt.="<th width='10%'><u>First Name</u></th>";
	$kopt.="<th width='10%'><u>Last Name</u></th>";
	$kopt.="<th width='15%'><u>Phone Number</u></th>";
	$kopt.="<th width='15%'><u>Point</u></th>";
	
	$kopt .="</tr>";	
	echo $kopt;

while($result = $query->fetch(PDO::FETCH_ASSOC)){
	$bothName="";
	$candidateID = $result["candidateID"];
	$firstName = $result["firstName"];
	$lastName = $result["lastName"];
	$bothName=$firstName.$lastName;
	$age = $result["age"];
	$email = $result["email"];
	$phone = $result["phone_no"];
	$candpoint = $result["candpoint"];
	
	
	//echo $result["firstName"].",Last Name".$result["lastName"];

	$opt="<tr>";
	$opt .="<td width='7%'>{$result['candidateID']}</td>";
	$opt .="<td width='10%'>{$result['firstName']}</td>";
	$opt .="<td width='10%'>{$result['lastName']}</td>";
	$opt .="<td width='15%'>{$result["phone_no"]}</td>";
	$opt .="<td width='15%'>{$result["candpoint"]}</td>";
	$opt .="</tr>";	
	echo $opt;
	
}	
	
?>