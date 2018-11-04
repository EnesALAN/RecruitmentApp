<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Candidate Picker</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/buttonsettings.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script type="text/javascript">
	var t ="University";
	var idk="";
	var flag=0;
	var links = $(':button');
	function specify(vari){
		t=vari;
		}
	

    $(document).ready(function(){
        $(":button").click(function(){
            
				$(":button").css('background-color', 'white');
                $(this).css('background-color', '#87CEFA');

        });
    });


	function win(varit){
		idk=varit;
	var height = 650;
    var width = 570;
	window.open("", "chat", "height=" + height + ", width = " + width);
	var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "showcandidate.php");
    form.setAttribute("target", "chat");

    var hiddenField1 = document.createElement("input");

    hiddenField1.setAttribute("type", "hidden");
    hiddenField1.setAttribute("id", "login");
    hiddenField1.setAttribute("name", "login");
    hiddenField1.setAttribute("value", idk);




    form.appendChild(hiddenField1);

    document.body.appendChild(form);
    form.submit();

	}

    function getStates(value){
		
		var a=t;
        $.post("tryme.php", { "partialState":value , "target":a },
        function(data){
            $("#results").html(data);
        });
    }
    </script>
	<?php
		 session_start();
		if(empty($_SESSION['name'])) {
			 //echo 'Set and not empty, and no undefined index error!';
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
        <h2>SEARCH CANDIDATE</h2>
		<p>This section is for view candidate information.You can easily select candidate name and see candidate's information.</p>
		<input type="button" onclick="specify(this.value)" value="University"  />
		<input type="button" onclick="specify(this.value)" value="City"  />
		<input type="button" onclick="specify(this.value)" value="Age" />
		<input type="button" onclick="specify(this.value)" value="Language"/>
		<input type="button" onclick="specify(this.value)" value="Skills"/>
		<input type="button" onclick="specify(this.value)" value="Master Education" />
		<input type="button" onclick="specify(this.value)" value="Experience" />
		
		<!--<label for="age">Age</label>
		 <input type="checkbox" id="age" name="option" value="age" />
		 <label for="age">Skills</label>
		 <input type="checkbox" id="age" name="option" value="age" />
		 <label for="age">Licence</label>
		 <input type="checkbox" id="age" name="option" value="age" />
		 <label for="age">Language</label>
		 <input type="checkbox" id="age" name="option" value="age" />
		 //-->

		<div class="tryto">
		<p>Please type part of the String:<p>
		</div>
		<input type="text" class="searchset" name="input" onkeyup="getStates(this.value)" /><br />
		<div id="results">
		</div>


        <p> </p>
           <hr>
      </div>

     
    
    
    
  <div class="clear"></div>
  
  
  <div id="footer">Candidate Picker Website</a><br>
  
   <p>You logged in as an Admin</p>
  
  </div>
  
  



</body></html>