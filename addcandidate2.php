<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Candidate Picker</title>
<?php
		 session_start();
		if(empty($_SESSION['name'])) {
			 echo 'Set and not empty, and no undefined index error!';
			 header("location:adminlogin.php");
		}
   


		?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script>
function myFunction(val) {
    var i=1;

	if(val==1){
		my_div.innerHTML=" ";
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext'>     "
		addOption();                              
		           
	}
	else if(val==2){
		my_div.innerHTML=" ";
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext'>"
		addOption();
		i++;
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext1'>"
		addOption2();
	}
	else if(val==3){
		my_div.innerHTML=" ";
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext'>"
		addOption();
		i++;
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext1'>"
		addOption2();
		i++;
		my_div.innerHTML = my_div.innerHTML +i+".Language:<br><input type='text' name='mytext2'>"
		addOption3();
	}

}

function addOption(){
	my_div.innerHTML = my_div.innerHTML + "<select name='level' style='width:150px; margin-left:13px; border-radius:4px;'><option value='Elemantary'selected>Elemantary</option><option value='intermediate'>Intermediate</option><option value='advanced'>Advanced</option></select><br>" 
	
}
function addOption2(){
	my_div.innerHTML = my_div.innerHTML + "<select name='level1' style='width:150px; margin-left:13px; border-radius:4px;'><option value='Elemantary'selected>Elemantary</option><option value='intermediate'>Intermediate</option><option value='advanced'>Advanced</option></select><br>" 
	
}
function addOption3(){
	my_div.innerHTML = my_div.innerHTML + "<select name='level2' style='width:150px; margin-left:13px; border-radius:4px;'><option value='Elemantary'selected>Elemantary</option><option value='intermediate'>Intermediate</option><option value='advanced'>Advanced</option></select><br>" 
	
}


function myFunction2(val) {
    var i=1;

	if(val==1){
		my_divi.innerHTML=" ";
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp1'>"            
	}
	else if(val==2){
		my_divi.innerHTML=" ";
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp1'><br>"
		i++;
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp2'>"
	}
	else if(val==3){
		my_divi.innerHTML=" ";
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp1'><br>"
		i++;
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp2'><br>"
		i++;
		my_divi.innerHTML = my_divi.innerHTML +i+".Experience:<br><input type='text' name='myexp3'><br>"
	}

}


function myFunction3(val) {
    var i=1;

	if(val==1){
		my_divid.innerHTML=" ";
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill1'>"            
	}
	else if(val==2){
		my_divid.innerHTML=" ";
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill1'><br>"
		i++;
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill2'>"
	}
	else if(val==3){
		my_divid.innerHTML=" ";
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill1'><br>"
		i++;
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill2'><br>"
		i++;
		my_divid.innerHTML = my_divid.innerHTML +i+".Skill:<br><input type='text' name='skill3'><br>"
	}

}

</script>
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
        <h2>ADD NEW CANDIDATE</h2>
		<p>In this section, you can add new candidate. Please fill all labels.</p>
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
		City:<br>
		<input type="text" name="city"><br>
		E-mail:<br>
		<input type="email" name="email"><br>
		Phone Number:<br>
		<input type="tel" name="telNo" placeholder="542-629-9228"><br>
		Birthday:<br>
		<input type="date" name="bday" max="2000-12-31" min="1965-01-01" placeholder="12-31-1995"><br>
		Foreign Language Number:<br>
		<select name="langno" onchange="myFunction(this.value)" style="width:150px; margin-left:13px;">
		<option value='0'selected>0</option>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		</select><br>
		<div id="my_div">
		
		
		</div>
		Driving Licence:<br>
		<select name="licence" style="width:150px; margin-left:13px;">
		<option value='1'selected>Yes</option>
		<option value='0'>No</option>
		</select><br>
		Marital Status:<br>
		<select name="marital" style="width:150px; margin-left:13px;">
		<option value='single'selected>Single</option>
		<option value='married'>Married</option>
		<option value='divorced'>Divorced</option>
		</select><br>
		Disability:<br>
		<select name="disable" style="width:150px; margin-left:13px;">
		<option value='1'>Yes</option>
		<option value='0' selected>No</option>
		</select><br>
		Please Choose number of your Experience which you want to share:<br>
		<select name="exp" onchange="myFunction2(this.value)" style="width:150px; margin-left:13px;">
		<option value='0'selected>0</option>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		</select><br>
		<div id="my_divi">
		
		
		</div>
		Please Choose number of your Professional Skills which you want to share:<br>
		<select name="skill" onchange="myFunction3(this.value)" style="width:150px; margin-left:13px;">
		<option value='0'selected>0</option>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		</select><br>
		<div id="my_divid">
		
		
		</div>
		University:<br>
		<select name="universityvalue" style="width:250px; margin-left:13px;">
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
 
</select><br>
		Master Education:<br>
		<input type="text" name="master"><br><br>

  <input type="submit" name="submit" value="Submit"/>
</form>
		<form action="blankcandidate.php" method="POST">

		<br><input type="submit" name="submit2" value="Create Blank Candidate"/>
		</form>		
        
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
   <p>You logged in as an Admin</p>
  
  
  </div>
  
  



</body></html>