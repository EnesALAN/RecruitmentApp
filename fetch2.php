<?php

		
		
		include 'databaseconnection.php';
		$query = $conn->prepare("SELECT * FROM `jobs`");
		$query->execute();
		
		
		$opt="<p><select name='selectedjob' style='width:310px;'></p>";
		$opt.="<option value=''selected>Select a Job</option>";
		while($result = $query->fetch(PDO::FETCH_ASSOC)){
			$opt .="<option value='{$result['jobId']}'>{$result['jobName']}</option>";
			
		}
		
		$opt .="</select>";
		
		echo $opt;
?>

