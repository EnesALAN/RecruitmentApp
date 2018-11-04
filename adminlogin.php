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
	  <h1>Dear Admin</h1>
        
        <h2>Please enter your login information</h2>
		<form action="adminloginresult.php" method="POST">	
		User Name:<br>
		<input type="text" id="clicker" name="username" class="login"><br>
		Password:<br>
		<input type="password" id="pword" name="password" required class="login"><br><br>
		<input type="submit" name="submit" id="submit2" value="Login" class="login"/>
		</form>
        <br>
		<div class="register">
		<a href="registeradmin.php">Do not have any account click to register.</a>
		</div>
		
		
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
  
  </div>
  
  



</body></html>