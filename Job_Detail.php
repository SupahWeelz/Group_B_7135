<!-- 
   | -Given job id, searches database for info related to that job. (SQL queries)
   | -Job creator can:
   | 	>Edit job posting
   |	>Filter applicants
   | -Job applicant can:
   |	>Apply for job
 -->
<?php
	include("include/Header.php");
?>

<!-- Gets job info from database -->
<?php
	$job_id=1; // replace with $_POST["some variable here"] received from Job_Apps, Job_Search_Results;
	
	//Query to extract details about job
	$sql = "SELECT JobName,Description,Open_date,Close_date,Number_available,Qualification,SalaryRange,Location,Benefits,Questions FROM job WHERE JobID = ".$job_id;
	$result = Query($sql,$db);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	//Display results
	
	//Add more labels
	echo '<h2>Job Listing</h2>';
	echo 'Job Title: '.$row['JobName'].'<br/>';
	echo 'Description: '.$row['Description'].'<br/>';
	echo 'Positions Available: '.$row['Number_available'].'<br/>';
	echo 'Qualifications: '.$row['Qualification'].'<br/>';
	echo 'SalaryRange: '.$row['SalaryRange'].'<br/>';
	echo 'Location: '.$row['Location'].'<br/>';
	echo 'Benefits: '.$row['Benefits'].'<br/>';
	echo 'Questions: '.$row['Questions'].'<br/>';
	echo '<br/>';

	//Job poster can edit job posting

	//Check if user is the one who created the job posting
	//If so, show input fields for changing the job posting
	//Otherwise, show input fields for applying to the job posting
	
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
		
		$sql="SELECT userlogin.ID FROM userlogin,job WHERE PostedBy=".$_SESSION["id"];
		$result=Query($sql,$db);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if(!empty($row)){
			// Poster can change JobName, Description, Open_Date,Close_Date, Number_available, Qualification, SalaryRange,JobType, Location, Benefits, Questions.
			echo 'Hello Job Poster.';
			echo '<form method="POST" action="">';
			echo 'Job title:<input type="text" name="jobname"></input><br/>';
			echo 'Description:<input type="text" name="description"></input><br/>';
			echo 'Open date:<input type="text" name="opendate"></input><br/>';
			echo 'Close date:<input type="text" name="closedate"></input><br/>';
			echo 'Positions available:<input type="text" name="numberavailable"></input><br/>';
			echo 'Qualifications:<input type="text" name="qualification"></input><br/>';
			echo 'Salary range:<input type="text" name="salaryrange"></input><br/>';
			echo 'Job type:<input type="text" name="jobtype"></input><br/>';
			echo 'Location:<input type="text" name="location"></input><br/>';
			echo 'Benefits:<input type="text" name="benefits"></input><br/>';
			echo 'Questions:<input type="text" name="questions"></input><br/>';
			echo '<input type="submit" name="updatePosting"></input>';
			echo '</form>';
		}
		else{
			echo '<form action="Job_Seeker_Register.php" type="POST">';
			echo '<input type="submit" value="Create Jobseeker profile"/>';
			echo '</form>';
			echo '<form action="Process_Application.php" type="POST">';
			echo '<input type="submit" value="Apply"/>';
			echo '</form>';
		}
	}
	else{
		echo '<form action="Job_Seeker_Register.php" type="POST">';
		echo '<input type="submit" value="Create Jobseeker profile!"/>';
		echo '</form>';
		echo '<form action="Process_Application.php" type="POST">';
		echo '<input type="submit" value="Apply"/>';
		echo '</form>';
	}
	
	//$user_id=$_SESSION["id"];
	//header("location: index.php");
?>
	
<?php
	include "include/Footer.php";
?>
