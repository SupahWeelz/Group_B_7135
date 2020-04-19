<!--
	| Contains form for new job application
	| Creates a new entry in the Application table
 -->
<?php
	include "include/Header.php";
	include "include/Config.php";
	//echo date('Y-m-d');

	//print_r($_POST);
	
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false ){
		echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
	}
	
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
		
		//print_r($_POST);
		
		$makeApp="INSERT INTO application (JobID,JobSeekerID,Justification,Applied_date,Answers) VALUES (".$_POST["JobID"].",".$rowb["JobSeekerID"].",'".$_POST["justification"]."','".date('Y-m-d')."','".$_POST["answer"]."')";
		$resultc=query($makeApp,$db);
		
		if($resultc == True){
			// Get applicant email address
			$getEmail="SELECT Email FROM userlogin WHERE UserID=".$_SESSION["id"];
			$result=query($getEmail,$db);
			$row=mysqli_fetch_assoc($result);
			
			$address=$row["Email"];
			$subject="DCDR Application";
			$from="DCDR";
			
			// Get job title
			$getJob="SELECT JobName FROM job WHERE JobID=".$_POST["JobID"];
			$result2=query($getJob,$db);
			$row2=mysqli_fetch_assoc($result2);
			
			$message="You have successfully submitted an application for the position: ".$row2["JobName"].".";
			$message=wordwrap($message,70);
			
			mail($address,$subject,$message,$from);
			
			echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
		}
		else{
			echo "Query unsuccessful!";
		}
	}
	include("include/Footer.php");
?>