<!DOCTYPE html>
<html>
<head>


</head>
<body>
<h1>Please enter candidate Information</h1>
<?php
include 'databaseconnection.php';
$query = $conn->prepare("SELECT * FROM `universities`");
$query->execute();


?>
<form action="submitcandidate.php" method="POST">	
  Candidate Id:<br>
  <input type="text" name="candidateId"><br>
  First name:<br>
  <input type="text" name="fName"><br>
  Last name:<br>
  <input type="text" name="lName"><br>
  Age:<br>
  <input type="text" name="age"><br>
  City:<br>
  <input type="text" name="city"><br>
  <br>
  <select name="dyno_data">
  <option value=''selected>
	Select a University
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


</body>
</html>