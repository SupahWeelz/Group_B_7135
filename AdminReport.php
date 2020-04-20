<!--
   | page generates a report of the current applicants list for all jobs posted by recruiter
   | It will be nested SQL loops: first loop loops through recruiter jobs then selects all the applicants for that job.
-->
<?php
	include "include/Header.php";
	include "include/Config.php";
?>
    		<h1>Recruiter Report </h1>
 <?php
	// Gets the current applications for the current recruiter 
	$_ID=$_POST["InputRecruiterID"]; ?>
	<!-- To print value from post statement -->
	JobID= <?php echo $_POST["InputRecruiterID"]; ?><br>
	<!-- To print value not raw from PHP -->
     
<?php 
	$queryApplications ="SELECT JobID,JobName,JobDescription,Location FROM job WHERE CompanyID=". $_ID;
	$result = query($queryApplications,$db);
	//result count
	$row_cnt = mysqli_num_rows($result);
	printf(" We found %d Job Matches.\n", $row_cnt);
	echo'<table border-style: solid border="2" cellspacing="2" cellpadding="2">
	<tr>
		<td> <font face="Arial">JOB ID</font></td>
		<td> <font face="Arial">JOB NAME</font></td>
		<td> <font face="Arial">DESCRIPTION</font></td>
		<td> <font face="Arial">LOCATION</font></td>
		<td> <font face="Arial">APPLICATIONS</font></td>
	</tr>';
	while ($row = $result->fetch_assoc())
	{ ?>
			<td><?php echo $row["JobID"]; ?></td>
			<td><?php echo $row["JobName"]; ?></td>
			<td><?php echo $row["JobDescription"]; ?></td>
			<td><?php echo $row["Location"]; ?></td>
			<td>
			<?php $queryApplications2 ="SELECT ApplicationID,JobSeekerID,Applied_date FROM application WHERE JobID=". $row["JobID"]; 
			$result2 = query($queryApplications2,$db);
			$row_cnt2 = mysqli_num_rows($result2);
			printf(" <br>This Job Has %d Applications.\n", $row_cnt2);
			
	// LIST WALKING CODE HERE
			?>
			</td>
			</tr>
	<?php
	} ?>
</table>
<?php
    mysqli_free_result($result);
	include("include/Footer.php");   
?>
