<?php


$partialState = $_POST['partialState'];     
$target = $_POST['target'];  
include 'databaseconnection.php';
$university="SELECT `university`,`firstName`,`lastName`,`candidateID`  FROM `candidates2` WHERE university LIKE :like";
$city="SELECT `university`,`firstName`,`lastName`,`candidateID`  FROM `candidates2` WHERE city LIKE :like";
$age="SELECT `university`,`firstName`,`lastName`,`candidateID`  FROM `candidates2` WHERE age LIKE :like";
$lang="SELECT `university`,`firstName`,`lastName`,`candidateID`  FROM `candlang` WHERE combinedlang LIKE :like";
$skill="SELECT `university`,`firstName`,`lastName`,`candidateID`  FROM `candskills` WHERE combinedskill LIKE :like";
$master="SELECT `university`,`firstName`,`lastName`,`candidateID`  FROM `candidates2` WHERE master_educ LIKE :like";
$experience="SELECT `university`,`firstName`,`lastName`,`candidateID`  FROM `candexp` WHERE combinedexp LIKE :like";
if($target=="City"){
$query = $conn->prepare($city);
}
else if($target=="University"){
$query = $conn->prepare($university);
}
else if($target=="Age"){
$query = $conn->prepare($age);
}
else if($target=="Language"){
$query = $conn->prepare($lang);
}
else if($target=="Skills"){
$query = $conn->prepare($skill);
}
else if($target=="Master Education"){
$query = $conn->prepare($master);
}
else if($target=="Experience"){
$query = $conn->prepare($experience);
}
    $query->execute(array(':like'=>'%'.$_POST['partialState'].'%'));

    $result = $query->fetchAll();	

    foreach($result AS $state){

		echo '<div>'.$state['university'].'</div>';  
        echo '<div>'."Candidate ID:".$state['candidateID']."&nbsp;" ."&nbsp;"."      Candidate Name&nbsp;:&nbsp;".$state['firstName']."\t".$state['lastName']."  <input type='button' onclick='win(this.id)' id='".$state['candidateID']."' value='Show Candidate' style='float:right;margin-top:-3px;margin-right:20px;'/> ".'</div>';  

		
    }
    die();


?>