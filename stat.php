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
		<li><a href="searchcandidate.php">Search University Information</a></li>
		<li><a href="addnewjob.php">Add New Job</a></li>
		<li><a href="listappliedjobs.php">List Applied Jobs</a></li>
		<li><a href="candidateranking.php">Candidate Ranking</a></li>
		<li><a href="pointsettings.php">Point Settings</a></li>
		<li><a href="adminlogin.php">Log out</a></li>
      </ul>
	  </div>
    </div>
	   
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
        <h1>Transaction Result</h1>

	
<?php
include 'databaseconnection.php';

$id=$_POST['id'];
$status=$_POST['status'];
$changedstatus=$_POST['changed'];


$candid=$_SESSION['candid'];

try{
$query = $conn->prepare("Update `job_enrollment` set acceptance_status='$changedstatus' where cand_id='$candid' and job_id='$id'");
$res = $query->execute();
if($changedstatus=="Accepted"){
	
		$query4 = $conn->prepare("SELECT * FROM `candidates2` WHERE candidateID='$candid'");
		$query4->execute();
		$result4 = $query4->fetch(PDO::FETCH_ASSOC);
		$email = $result4["email"];
		$name = $result4["firstName"];
		$lname = $result4["lastName"];
	
	
	require 'mail/phpmailer/PHPMailerAutoload.php';
	$mail= new PHPMailer;
	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	
	$mail->Username='candidatepicker@gmail.com';
	$mail->Password='enes2005';
	
	$mail->setFrom('candidatepicker@gmail.com','Hiring Process Application');
	$mail->addAddress($email);
	$mail->addReplyTo('candidatepicker@gmail.com');
	
	$mail->isHTML(true);
	$mail->Subject='Apply Job Information Message';
	$str='Dear '.$name.',';
	$mail->Body=$str."<br><p> Your job application is Accepted.We will share interview date and time with you later.</p>";

		if(!$mail->send()){
			?>
			<p>Interview Content Mail can not sent to your registered mail address</p>
			<?php
			}
			else{
			?>
			<p>Interview Content Mail sent to your registered mail address</p>
			<?php
		}
	
}
?>
<p>Succesfully changed current candidate status " <?php echo $status; ?> " to " <?php echo $changedstatus; ?> " for candidate id <?php echo $candid; ?>.</p>

<?php


}catch (PDOException $e) {
		echo 'Failed.';
        echo 'PDO Exception: ' . $e->getMessage();
        exit();
}

?>



	
    
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
     <p>You logged in as an Admin</p>
  
  </div>
  
  



</body></html>