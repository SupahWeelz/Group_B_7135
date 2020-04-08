<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">
<!--
   | -Allows user to view their own profile
   | -Checks session variable for user id and pulls info from database based on id
   | -For example:
   |	>if user is an applicant, then list the user's job applications
   | 	>if user is a recruiter,  then list the user's job postings
-->
<?php
	session_start();
?>
  <html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
   	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		 <link href="https://fonts.googleapis.com/css?family=Work+Sans: 30%"  />
		 <link type="text/css" rel="stylesheet" href="style.css"/>

</head>
<?php
	include_once("include/Config.php");
	include("include/Query.php");

	$RecruiterVal=30;

	// Checks if user is logged in
	if(!isset($_SESSION["loggedin"])){
		echo "<script type='text/javascript'> document.location = 'Login.php'; </script>";
	}
	else{
		// Display basic information like profile photo, name, current job, etc.

		echo '<body>
    <div class="card">
        <img src="include/boss.jpg" alt="Iguardo" style="width:100%"/>
        <h1>Iguardo Valencia</h1>
        <p class="title">Procurement Category Specialist (New Energies), Shell</p>
        <p>Texas AM</p>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <p><button>Contact</button></p>
    </div>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"/>
        <input type="submit" value="Upload Image" name="submit"/>
    </form>
    <p> **Upload doesn\'t work just yet. We\'ll have to add photo capability to the database.**</p>

    <div class="info">

        <!--<h2>About Me:</h2>-->

    </div>

		<!job seacrh code starts here....................................................>

		<div id="jobserach" align="right">
	<div id="jobsearch_box" align="right">
	  <form action = "upload.php" method = "post">
			<p><button>Job Search</button></p>
	     <label>Job title  :</label>
	     <input type = "text" name = "jname" class = "box"/><br /><br />
	     <label>Keywords  :</label>
	     <input type = "text" name = "keyword" class = "box"/><br/><br />
	     <label>Job type :</label>
	     <select type="text" name="jtype" class ="box"/> <br/><br/>
	      <option value="FullTime">Full-time</option>
	      <option value="PartTime">Part-time</option>
	      <option value="Other">Other</option>
	    </select>
		<p>	<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Search</button></p>
	  </form>
	</div>

	</div>
</body>';

		// Query to see if user is a job seeker
		$isSeeker="SELECT UserID FROM jobseeker,userlogin WHERE ID=".$_SESSION["id"]." AND ID=UserID";
		$result = query($isSeeker,$db);
		$count = mysqli_num_rows($result);
		//print_r($row);

		if($count > 0){
			echo '<div class="info">';
			echo '<form action="Job_Apps.php" method="POST"><button value="View Job Applications">View Job Applications</button></form>';
			echo '</div>';
		}

		// Query to see if user is a recruiter
		$isPoster="SELECT UserTypeID FROM userlogin WHERE ID=".$_SESSION["id"];
		$resultb = query($isPoster,$db);
		$row = mysqli_fetch_array($resultb,MYSQLI_ASSOC);

		if($row["UserTypeID"] == $RecruiterVal){
			// Display job postings here
			echo '<h2>Job Postings:</h2>';
		}
	}
?>
