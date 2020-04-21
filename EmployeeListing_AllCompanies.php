<!--
   | -Page for jobseekers to view their applications
   | -Only reachable from user's profile when the user is logged in
-->
<?php
	include "include/Header.php";
	include "include/Config.php";
	//print_r($_POST);
?>
    		<h1>Admin Page 10 - Employee Listing for All Companies</h1>
 <?php
	// Selects and displays applications that current user has applied to
	//$getApplications = "SELECT * FROM application, job, jobseeker WHERE jobseeker.JobSeekerID = application.JobseekerID AND A.JobID = B.JobID GROUP BY A.ApplicationID ORDER BY Close_date";


	//$getApplications = "SELECT job.JobName,application.ApplicationID,application.Applied_date,job.JobDescription,company.CompanyName FROM company,application,jobseeker,job,userlogin WHERE jobseeker.JobSeekerID = application.JobseekerID AND application.JobID = job.JobID AND company.CompanyID = job.CompanyID AND jobseeker.UserID = userlogin.UserID AND userlogin.UserID = ".$_SESSION["id"];
	$getEmployees = "SELECT employee.CompanyID, Companyname, Username, FirstName, LastName , userlogin.Phone, UserTypeName FROM employee, userlogin, usertype , company WHERE employee.companyid = company.CompanyID and userlogin.UserID = employee.UserID and userlogin.UserTypeID = usertype.UserTypeID order by CompanyName , usertype.UserTypeID";
	//$getEmployees = "SELECT CompanyID FROM employee";
	
	$result = query($getEmployees,$db);
	
	$count = mysqli_num_rows($result);
		
	if ($count > 0) {
		$myCount=1;
		//echo "<table><tr><th>No.</th><th>CompanyName</th><th>UserName</th><th>FirstName</th><th>LastName</th><th>Phone</th><th>UserTypeName</th></tr><hr/>";
		//echo "<table><tr><th>CompanyName</th><th>UserName</th><th>FirstName</th><th>LastName</th><th>Phone</th><th>UserTypeName</th></tr><hr/>";
		echo "<table><tr><th>CompanyID</th><th>UserName</th><th>FirstName</th><th>LastName</th><th>Phone</th><th>UserTypeName</th></tr>";
		while($row = mysqli_fetch_assoc($result)){
			//echo "<tr><td>".$myCount."</td><td>".$row["CompanyName"]."</td><td>".$row["Username"]."</td><td>".$row["FirstName"]."</td><td> ".$row["Phone"]."</td><td> ".$row["UserTypeName"]."</td>";
			echo "<tr><td>".$row["CompanyID"]."</td><td>".$row["Username"]."</td><td>".$row["FirstName"]."</td><td> ".$row["Phone"]."</td><td> ".$row["UserTypeName"]."</td>";
			//echo "<tr><td>".$row["CompanyID"]."</td>";
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
