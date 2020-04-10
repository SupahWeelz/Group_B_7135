<!--
	| Contains form for new job application
	| Creates a new entry in the Application table
 -->
<?php
	include "include/Header.php";
	include "include/Config.php";
	//echo date('Y-m-d');

	//print_r($_POST);

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Check if user has a jobseeker profile
	
		$isSeeker="SELECT jobseeker.UserID,JobSeekerID FROM jobseeker,userlogin WHERE userlogin.UserID=".$_SESSION["id"]." AND userlogin.UserID=jobseeker.UserID";

		$result = query($isSeeker,$db);
		$count = mysqli_num_rows($result);
		
		if ($count < 1){
			echo "<script type='text/javascript'> document.location = 'Job_Seeker_Register.php'; </script>";
		}
		
		//$getSeeker="SELECT JobSeekerID FROM jobseeker,userlogin WHERE ID=".$_SESSION["id"]." AND jobseeker.UserID = ID";
		$rowb=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		// Insert new application
		
		$makeApp="INSERT INTO application (JobID,JobSeekerID,Justification,Applied_date,Answers) VALUES (".$_POST["jobId"].",".$rowb["JobSeekerID"].",'".$_POST["justification"]."','".date('Y-m-d')."','".$_POST["answer"]."')";
		$resultc=query($makeApp,$db);
		
		if($resultc == True){
			echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
		}
		else{
			echo "Query unsuccessful!";
		}
	}
	include("include/Footer.php");
?>