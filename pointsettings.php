<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Candidate Picker</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<?php
		 session_start();
		if(empty($_SESSION['name'])) {
			 echo 'Set and not empty, and no undefined index error!';
			 header("location:adminlogin.php");
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
        
		<li><a href="mainpage.php">Home</a></li>
		<li class='active has-sub'><a href='#'><span>Candidate Settings</span></a>
		<ul>
         <li class='has-sub'><a href='selcan.php'><span>Select Candidate</span></a></li>
         <li class='has-sub'><a href='addcandidate2.php'><span>Add New Candidate</span></a></li>
		<li class='has-sub'><a href='deletecandidate.php'><span>Delete Candidate</span></a></li>
		<li class='has-sub'><a href='updatecandidatestatus.php'><span>Update Candidate Status</span></a></li>
		</ul>
		</li>
		<li><a href="searchcandidate.php">Search Candidate Information</a></li>
		<li><a href="addnewjob.php">Add New Job</a></li>
		<li><a href="newse.php">Export Table</a></li>
		<li><a href="listappliedjobs.php">List Applied Jobs</a></li>
		<li><a href="candidateranking.php">Candidate Ranking</a></li>
		<li><a href="pointsettings.php">Point Settings</a></li>
		<li><a href="logout.php">Log out</a></li>
      </ul>
	  </div>
    </div>
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
        <h2>Automatic Point System Settings Page</h2>
		<p>In this section, you can change automatic point system settings.Please fill all labels.
		<br>
		Current Points is displayed next to the input labels.
		</p>
		<?php
		include 'databaseconnection.php';
		try{
			$query = $conn->prepare("Select * from auto_point");
			$res = $query->execute();
			while($result = $query->fetch(PDO::FETCH_ASSOC)){
				$langpo = $result["languagenopoint"];
				$dlicpo = $result["dlicencepoint"];
				$youngpo = $result["youngtalentpoint"];
				$maritalpo = $result["maritalstatuspoint"];
				$masterpo = $result["masterpoint"];
				$dispo = $result["disabilitypoint"];
			}
		}catch (PDOException $e) {
				echo 'Failed.';
				echo 'PDO Exception: ' . $e->getMessage();
				exit();
		}

?>
		
		
		
		<form action="autopoint.php" method="POST">	
		Foreign Language:<br>
		<input type="number" name="language">
		Current Value : <?php echo "<strong>".$langpo."</strong>" ?> 
		<br>
		Driving Licence:<br>
		<input type="number" name="dlicence">
		Current Value : <?php echo "<strong>".$dlicpo."</strong>" ?> 
		<br>
		Young Talent:<br>
		<input type="number" name="young">
		Current Value : <?php echo "<strong>".$youngpo."</strong>" ?> 
		<br>
		Marital Status:<br>
		<input type="number" name="marital">
		Current Value : <?php echo "<strong>".$maritalpo."</strong>" ?> <br>
		Master Education:<br>
		<input type="number" name="master">
		Current Value : <?php echo "<strong>".$masterpo."</strong>" ?> <br>
		Disability Flag:<br>
		<input type="number" name="disable">
		Current Value : <?php echo "<strong>".$dispo."</strong>" ?> <br><br>
		<input type="submit" name="submit" value="Submit"/>
		</form>
	
        
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
   <p>You logged in as an Admin</p>
  
  
  </div>
  
  



</body></html>