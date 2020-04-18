<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<!--
   | -Page for jobseekers to view their applications
   | -Only reachable from user's profile when the user is logged in
-->
<?php
	include "include/Header.php";
	include "include/Config.php";
?>
    		<h1>Current Applications </h1>
 <?php
	// Selects and displays applications that current user has applied to
	//$getApplications = "SELECT * FROM application, job, jobseeker WHERE jobseeker.JobSeekerID = application.JobseekerID AND A.JobID = B.JobID GROUP BY A.ApplicationID ORDER BY Close_date";

	$getApplications = "SELECT job.JobName,application.Applied_date,job.JobDescription,company.CompanyName FROM company,application,jobseeker,job WHERE jobseeker.JobSeekerID = application.JobseekerID AND application.JobID = job.JobID AND company.CompanyID = job.CompanyID AND jobseeker.UserID = ".$_SESSION["id"];

	$result = query($getApplications,$db);
	$count = mysqli_num_rows($result);
	//echo $count;
	//print_r($row);
		if ($count > 0) {
			$myCount=1;
			echo "<table><tr><th>No.</th><th>Job Title</th><th>Submission Date</th><th>Job Description</th><th>Company</th></tr><hr/>";
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr><td>".$myCount."</td><td>".$row["JobName"]."</td><td>".$row["Applied_date"]."</td><td>".$row["JobDescription"]."</td><td> ".$row["CompanyName"]."</td></tr>";

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


    <!--Need to Add Application Numbering ie 1 to 50 && add a remove/delete button to each row-->

<?php
	include("include/Footer.php");
?>
