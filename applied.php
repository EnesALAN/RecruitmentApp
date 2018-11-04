<!DOCTYPE html>
<html>
<head>
<?php
		 session_start();
		if(empty($_SESSION['name'])) {
			 echo 'Set and not empty, and no undefined index error!';
			 header("location:candidateloginpage.php");
		}
   



?>
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
	   	<li><a href="logout.php">Log out</a></li>
      </ul>
	  </div>
	
  <div id="page_content">
    <div class="left_section">
      <div class="common_content">
        <h2>Transaction Result</h2>

<?php

$candId=$_SESSION['name'];
$jobId=$_POST['selectedjob'];
$desc=$_POST['jobReason'];
$jobpoint=0;

include 'databaseconnection.php';

	$query2 = $conn->prepare("SELECT * FROM `jobs` where jobId='$jobId'");
	$query2->execute();
	$result = $query2->fetch(PDO::FETCH_ASSOC);
	$jobName = $result["jobName"];
	$status="Analyzing";
try{
	
$query = $conn->prepare("INSERT INTO Job_enrollment values('$candId','$jobId','$jobpoint','$desc','$status')");
$res = $query->execute();

	
		$query4 = $conn->prepare("SELECT * FROM `candidates2` WHERE candidateID='$candId'");
		$query4->execute();
		$result4 = $query4->fetch(PDO::FETCH_ASSOC);
		$email = $result4["email"];
		$name = $result4["firstName"];
		$lname = $result4["lastName"];
?>

<?php

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
	$mail->Body=$str."<br><p> You succesfully apply job</p>";

		if(!$mail->send()){
			?>
			<p>Information Mail can not sent to your registered mail address</p>
			<?php
			}
			else{
			?>
			<p>Information Mail sent to your registered mail address</p>
			<?php
		}

?>
<p> You succesfully apply job which Name is <?php echo $jobName.' '?> </p>

<?php

}catch (PDOException $e) {
		echo 'You already apply this job which Name is '.$jobName.' ';
		?><br>
		<?php
        echo 'PDO Exception: ' . $e->getMessage();

}



	
?>
      
	 
           <hr>
      </div>

     

    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
  
  
  </div>
  
  



</body></html>