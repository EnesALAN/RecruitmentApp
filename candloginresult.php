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
	  <h1>Transaction Result</h1>

		
		<?php 
session_start();
include("databaseconnection.php");
?>
<?php
$msg = ""; 
if(isset($_POST['submit'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `CandLogin` where `canduser_id`=:username and `password`=:password";
      $stmt = $conn->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /*******************************************/
       
        echo 'Succesfully Logged In';
		session_start();
		$_SESSION['name'] = $username;
        header("location:candlogin.php");
       
      } else {
        $msg = "Invalid username and password!";
		echo $msg;
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
	echo $msg;
  }
}
?>
		
		
          
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
  
  </div>
  
  
</body>
</html>