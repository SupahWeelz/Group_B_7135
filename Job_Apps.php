<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<!--
   | -Page for jobseekers to view their applications
   | -Only reachable from user's profile when the user is logged in
-->
<?php
	include("include/Header.php");
	include "include/Config.php";
?>
    		<h1>Current Applications </h1>
   		 <?php
 			$getApplications = "SELECT JobName, Applied_date, Description, B.CompanyID
           		FROM application as A, job as B, jobseeker as C
           		WHERE C.JobSeekerID = A.JobseekerID AND A.JobID = B.JobID
            		GROUP BY A.ApplicationID
            		ORDER BY Close_date";
	
			$result = query($getApplications,$db);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$count = mysqli_num_rows($result);

    			if ($count > 0) {
				echo "<table><tr><th>Job Title</th><th>Submission Date</th><th>Job Description</th><th>Company</th></tr>";
        			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["JobName"]."</td><td>".$row["Applied_date"]."</td><td>".$row["Description"]."</td><td> ".$row["B.CompanyID"]."</td></tr>";
        				}
        			echo "</table>";
   			} 
			else {
				echo "0 results";
    			}
			$db -> close();
  	  	?>

    <!--Need to Add Application Numbering ie 1 to 50 && add a remove/delete button to each row-->

<?php
	include("include/Footer.php");
?>
