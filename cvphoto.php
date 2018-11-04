<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Candidate Picker</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/takeimg.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
		 session_start();
		if(empty($_SESSION['name'])) {
			 echo 'Set and not empty, and no undefined index error!';
			 header("location:candidateloginpage.php");
		}
   


?>

</head>
<body>
<div id="wrapper"> 
  
  <div id="header">
  
  <div class="banner_img">
    <h1>Candidate Picker Program</h1>
    <p>Choose the best candidate</p>
    </div>

	</div>
		
	<div class="navigation">
	<div id='cssmenu'>
      <ul>
        <li><a href="candlogin.php">Home</a></li>
        <li><a href="jobposting.php">Job Posting</a></li>
        <li><a href="applyajob.php">Apply for A Job</a></li>
		<li><a href="uploadcv.php">Upload CV</a></li>
		<li><a href="cvphoto.php">Upload CV by taking photo</a></li>
		<li><a href="candidatesetting.php">Candidate Settings</a></li>
		<li><a href="candstatus.php">Candidate Apply Status</a></li>
	   	<li><a href="adminlogin.php">Log out</a></li>
      </ul>
	  </div>
    </div>
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
	
        <h2>Take a Photo of your CV</h2>
		
	



	<div id="results"></div>
	
	
	
	<form>
	<div id="my_camera"></div>
	
	<script type="text/javascript" src="webcam.js"></script>
	
	
	<script language="JavaScript">
		Webcam.set({
			width: 450,
			height: 460,
			
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	
		<input type=button value="Take Snapshot" onClick="take_snapshot()" id="hide" style="margin-top:-130px; margin-left:-1px; width:450px;">
	</form>
		  <form action="autofillarea.php" method="POST">
	
	 <input type="submit" name="submit" value="Auto Fill" style="float:right; margin-top:-5px !important; width:450px; margin-right:60px"/>
</form>
	<script language="JavaScript">

		function take_snapshot() {

			Webcam.snap( function(data_uri) {
				
					
				Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
					document.getElementById('results').innerHTML = 
					'<img src="'+text+'" height="250" width="450"/>';
				} );	
			} );
		}
		
		
	$(document).ready(function(){
		$("#results").hide();
    $("#hide").click(function(){
        $("#results").show();
    });
});

	</script>

</body>
</html>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website<br>

  <p>You logged in as a Candidate</p>
  

   </div>
  



</body></html>