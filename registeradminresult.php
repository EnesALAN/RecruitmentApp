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
	
	<div class="enter">
      <ul>
        <li><a href="adminlogin.php">Admin Login</a></li>
        <li><a href="candidateloginpage.php">Candidate Login</a></li>
        
       
      </ul>
    </div>
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
	  <h1>Register Result Page</h1>
       
<?php
$adminUsername=$_POST['adusername'];
$adminPassword=$_POST['adpassword'];
$pwlength=strlen($adminPassword);


include 'databaseconnection.php';
if($pwlength>="5"){

try{
$query = $conn->prepare("INSERT INTO users(userName,password) values('$adminUsername','$adminPassword')");
$res = $query->execute();
?>
<h2>Account creation is succesfull. Admin <?php echo $adminUsername; ?> Account is ready to use.<h2>
<?php
}catch (PDOException $e) {
		echo 'Failed Register.';
        echo 'PDO Exception: ' . $e->getMessage();
        exit();
}
}
else{
	echo 'Failed Creating New Admin Account!';
	echo "<br>";
	echo 'Your password length must be greater than &nbsp;"&nbsp;'.$pwlength.'&nbsp;" &nbsp; for the safety of your Admin Account';
}


?>
		
		
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
  
  </div>
  
  



</body></html>