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
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
	
        <h2>Transaction Result</h2>
       
		
		<?php

			$folderdirectory = "testupload/";
			$folderdirectory  = $folderdirectory. basename( $_FILES['file']['name']) ;
			$file_type=$_FILES['file']['type'];
			$filenam=basename( $_FILES['file']['name']);
			if(file_exists($folderdirectory)){
				array_map('unlink', glob($folderdirectory));
				
				if ($file_type=="application/pdf" || $file_type=="image/jpeg" || $file_type== 'text/txt') {
					if(move_uploaded_file($_FILES['file']['tmp_name'], $folderdirectory))
					{
						$message="The file ". basename( $_FILES['file']['name']). " is uploaded.";
						?> 
						<p>Succesfully added file to the server.</p> 
						<p> <?php echo $message; ?></p> 
						<p>Dear Candidate if you want to fill your personal information by using uploaded CV Please click Auto Fill button.</p>
						  <form action="autofillarea.php" method="POST">
							<input type="hidden" name="fName" value="<?php echo $_FILES['file']['name'];?>"><br>
						
							<input type="submit" name="submit" value="Auto Fill" style="margin-bottom:40px; margin-top:-20px; width: 20em; margin-left:-8px;"/>
						  </form>
						<?php
					}
					else 
					{
						?>  <p>Cv upload is not complete.</p>    <?php
						echo "Problem occured while uploading file";
					}
				}
				else {
					?>  <p>Cv upload is not complete.</p>    <?php
					echo "You may only upload PDFs or JPEGs files.<br>";

					}
			}
			
			else{
				
				if ($file_type=="application/pdf" || $file_type=="image/jpeg") {
					if(move_uploaded_file($_FILES['file']['tmp_name'], $folderdirectory))
					{
						$message="The file ". basename( $_FILES['file']['name']). " is uploaded.";
						?> <p> <?php echo $message; ?></p> <?php
						
						
						?>
						
						     <p>Dear Candidate if you want to fill your personal information by using uploaded CV Please click Auto Fill button.</p>
	  <form action="autofillarea.php" method="POST">
		<input type="hidden" name="fName" value="<?php echo $_FILES['file']['name'];?>"><br>
	
	 <input type="submit" name="submit" value="Auto Fill" style="margin-bottom:40px; margin-top:-20px; width: 20em; margin-left:-8px;"/>
	  </form><?php
					}
					else 
					{
						?>  <p>Cv upload is not complete.<br>    <?php
						echo "Problem occured while uploading file";
						?></p><?php
					}
				}
				else {
					?>  <p>Cv upload is not complete. <br>  <?php
					echo "You may only upload PDFs or JPEGs files.<br>";
					?></p><?php
					}
			}
		?>
      


    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website<br>

  <p>You logged in as a Candidate</p>
  

   </div>
  



</body></html>