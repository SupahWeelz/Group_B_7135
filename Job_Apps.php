<!--
   | -Page for jobseekers to view their applications
   | -Only reachable from user's profile when the user is logged in
-->
<?php
	include "include/Header.php";
	include "include/Config.php";
	//print_r($_POST);
?>
    		<h1>Current Applications </h1>
 <?php
	// Selects and displays applications that current user has applied to
	//$getApplications = "SELECT * FROM application, job, jobseeker WHERE jobseeker.JobSeekerID = application.JobseekerID AND A.JobID = B.JobID GROUP BY A.ApplicationID ORDER BY Close_date";


	$getApplications = "SELECT job.JobName,application.ApplicationID,application.Applied_date,job.JobDescription,company.CompanyName FROM company,application,jobseeker,job,userlogin WHERE jobseeker.JobSeekerID = application.JobseekerID AND application.JobID = job.JobID AND company.CompanyID = job.CompanyID AND jobseeker.UserID = userlogin.UserID AND userlogin.UserID = ".$_SESSION["id"];

	$result = query($getApplications,$db);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		$myCount=1;
		echo "<table><tr><th>No.</th><th>Job Title</th><th>Submission Date</th><th>Job Description</th><th>Company</th><th></th></tr><hr/>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr><td>".$myCount."</td><td>".$row["JobName"]."</td><td>".$row["Applied_date"]."</td><td>".$row["JobDescription"]."</td><td> ".$row["CompanyName"]."</td><td>";
?>
<form method="POST" action="Remove_Job.php">
	<input type="hidden" value="<?php echo $row["ApplicationID"];?>" name="ApplicationID">
	<input type="submit" value="Remove">
</form></td></tr>
<?php

				$myCount=$myCount+1;
				if($myCount>51){
					break;
				}
			}
			echo "</table>";
			echo "<hr/>";
		}
		else {
			echo "0 results";
		}
?>

<?php
	include("include/Footer.php");
?>
