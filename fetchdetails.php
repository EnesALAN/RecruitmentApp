<?php

include "databaseconnection.php";

$columnName = $_POST['columnName'];
$sort = $_POST['sort'];

$query = "SELECT * FROM candidates2 order by ".$columnName." ".$sort." ";
$query->execute();

$html = '';
while($result8 = $query->fetch(PDO::FETCH_ASSOC)){
	$id2 = $result8["candidateID"];
	$fname2 = $result8["firstName"];
	$lname2 = $result8["lastName"];
	$age2 = $result8["age"];
	$city2 = $result8["city"];
	$educInfo2 = $result8["university"];
	$candpoint2=$result8["candpoint"];
	
	$html .= "<tr>
 <td>".$id2."</td>
 <td>".$fname2."</td>
 <td>".$lname2."</td>
 <td>".$age2."</td>
 <td>".$city2."</td>
  <td>".$educInfo2."</td>
  <td>".$candpoint2."</td>
 </tr>";
}


echo $html;