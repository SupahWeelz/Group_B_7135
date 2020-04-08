<?php
	include "include/Header.php";
?>
<?php
    
// capture the values for storage in sql statements
$_JobID=$_POST["JobID"];
$_JobName=$_POST["JobName"];
$_Description=$_POST["Description"];
$_CompanyID=$_POST["CompanyID"];
$_Posting_Date=$_POST["Posting_Date"];
$_Open_Date=$_POST["Open_Date"];
$_Close_Date=$_POST["Close_Date"];
$_Number_available=$_POST["Number_available"];
$_Postedby=$_POST["Postedby"];
$_Qualification=$_POST["Qualification"];
$_SalaryRange=$_POST["SalaryRange"];
$_JobType=$_POST["JobType"];
$_Location=$_POST["Location"];
$_Benefits=$_POST["Benefits"];
$_Questions=$_POST["Questions"]; 
// Conect to databaseF
// Create connection
$conn = new mysqli("localhost","root","","se_jobsearchapp");
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO job (JobID, JobName, Description, CompanyID, Posting_Date, Open_Date, Close_Date, Number_available, Postedby, Qualification, SalaryRange, JobType, Location, Benefits, Questions)

VALUES ($_JobID, '$_JobName','$_Description',$_CompanyID, $_Posting_Date, $_Open_Date, $_Close_Date, $_Number_available, $_Postedby, '$_Qualification', $_SalaryRange,'$_JobType', '$_Location', '$_Benefits','$_Questions')";

/*
$
*/

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
// End php tag
?>
<br>-----------------------------------------<br>
Your Job Listing<br>
JobID= <?php echo $_POST["JobID"]; ?><br>
JobName= <?php echo $_POST["JobName"]; ?><br>
Job Description= <?php echo $_POST["Description"]; ?><br>
Company ID= <?php echo $_POST["CompanyID"]; ?><br>
Posting Date= <?php echo $_POST["Posting_Date"]; ?><br>
Open Date= <?php echo $_POST["Open_Date"]; ?><br>
Close Date= <?php echo $_POST["Close_Date"]; ?><br>
Number Available= <?php echo $_POST["Number_available"]; ?><br>
Post By= <?php echo $_POST["Postedby"]; ?><br>
Qualification= <?php echo $_POST["Qualification"]; ?><br>
Salary Range= <?php echo $_POST["SalaryRange"]; ?><br>
Job Type= <?php echo $_POST["JobType"]; ?><br>
Location= <?php echo $_POST["Location"]; ?><br>
Benefits= <?php echo $_POST["Benefits"]; ?><br>
Questions= <?php echo $_POST["Questions"]; ?><br><br>

<button onclick="window.location.href = 'JobSearchPage';">View Jobs</button>
<?php
	include "include/Footer.php";
?>