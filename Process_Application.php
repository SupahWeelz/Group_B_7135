<!--
	| Contains form for new job application
	| Creates a new entry in the Application table
 -->
<?php
	include("include/Header.php");
	include "include/Config.php";
	
	// Check if user has a jobseeker profile
	
	$isSeeker="SELECT UserID FROM jobseeker,userlogin WHERE ID=".$_SESSION["id"]." AND ID=UserID";
	$result = query($isSeeker,$db);
	$count = mysqli_num_rows($result);
	
	if ($count < 1){
		echo "<script type='text/javascript'> document.location = 'Job_Seeker_Register.php'; </script>";
	}
	
	// Retrieve job seeker id
	
	$getSeeker="SELECT JobSeekerID FROM jobseeker,userlogin WHERE ID=".$_SESSION["id"]." AND jobseeker.UserID = ID";
	$resultb = query($getSeeker,$db);
	$rowb=mysqli_fetch_array($resultb,MYSQLI_ASSOC);
	
	// Insert new application
	
	$makeApp="INSERT INTO application (JobID,JobSeekerID,Applied_date, Justification,Answers) VALUES (".$_POST["jobId"].",".$rowb["JobSeekerID"].",".$_POST["justification"].",".date('Y-m-d').",".$_POST["answer"].")";
	$resultc=query($makeApp,$db);
	
	if($resultc == True){
		echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
	}
	else{
		echo "Query unsuccessful!";
	}
	
?>
		<form action="" method="POST">
		<div class="container">
			<h1>Job Application</h1>
			<p>Please fill in this form.</p>
			<hr/>
				<br/>
				
				<label for="justification"><b>Justification</b></label>
				<input type="text" name="justification" required="required"/>
				
				<br/>

				<label for="answer"><b>Answer</b></label>
				<input type="text" name="answer" required="required"/>
				
			<hr/>

			<button type="submit" class="registerbtn">Register</button>
		</div>
	</form>
<?php
	include("include/Footer.php");
?>