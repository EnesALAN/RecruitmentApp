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
	  <h1>Register Page</h1>
        
        <h2>Please enter your information to Register new account.</h2>
		<p>You must choose unique username and password must be at least 5 characters.</p>
		<form action="registeradminresult.php" method="POST">	
		User Name:<br>
		<input type="text" name="adusername" class="login"><br>
		Password:<br>
		<input type="password" name="adpassword" required class="login"><br><br>
		<input type="submit" name="submit" id="submit" value="Register" class="login"/>
		</form>
        <br>
		
		
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
  
  </div>
  
  



</body></html>