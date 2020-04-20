<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<!--
   | page generates a report of the current applicants tlist for all jobs posted by recruiter
   | It will be nested SQL loops first loop loops through recruiter jobs then select all the applants for that job.
-->
<?php
	include "include/Header.php";
	include "include/Config.php";
?>
	<h1>Administrator Report <br> From <?php echo $_POST["DateFrom"];?> TO <?php echo $_POST["DateTo"];?></h1>
<?php 
	$queryUsers ="SELECT JobSeekerID,UserID FROM jobseeker";
	$queryJobs ="SELECT JobID,JobName,JobDescription,Number_available,Location FROM job";
	$queryApplicantions ="SELECT ApplicationID,JobSeekerID JobID FROM application";
	$JobResult = query($queryJobs,$db);
	$UserResult=query($queryUsers,$db);
	$AppResult=query($queryApplicantions,$db);
	//result count
	$Jrow_cnt = mysqli_num_rows($JobResult);
	$Urow_cnt = mysqli_num_rows($UserResult);
	$Arow_cnt = mysqli_num_rows($AppResult);

	
	printf(" We found %d Job Matches.<br>", $Jrow_cnt);
	printf(" We found %d System Users.<br>", $Urow_cnt);
	printf(" We found %d Job Applicants.<br>", $Arow_cnt);
// job category with the highest # of applications
	
	echo'<table border-style: solid border="2" cellspacing="2" cellpadding="2">
	<tr>
		<td> <font face="Arial">JOB ID</font></td>
		<td> <font face="Arial">JOB NAME</font></td>
		<td> <font face="Arial">APPLICANT INFO</font></td>
	</tr>';
	while ($row = $JobResult->fetch_assoc())
	{ ?>
			<td><?php echo $row["JobID"]; ?></td>
			<td><?php echo $row["JobName"]; ?><br> 
				<?php echo $row["Number_available"]; ?>
				Open Position(s)
			</td>
			<td>
			<?php $queryApplications ="SELECT ApplicationID,JobSeekerID,Applied_date FROM
	        /* JobID is the id from jobResult query */
			application WHERE JobID=". $row["JobID"]; 
			$result2 = query($queryApplications,$db);
			$row_cnt2 = mysqli_num_rows($result2);
			printf(" This Job Has %d Applications.<br>", $row_cnt2);
            while ($rowI = $result2->fetch_assoc())
			{
			   echo "<br>";	
			   $queryINFO ="SELECT JobSeekerID, FROM jobseeker";
			   // new query jobseekerID-->joins userlogin to get username
			   echo "Application ID=";
			   echo $rowI["JobSeekerID"];
			   $queryApplications2 ="SELECT JobSeekerID, UserID, EverEmployee FROM jobseeker WHERE JobSeekerID=". $rowI["JobSeekerID"];
			   echo"<br> Ever Employee = ";  // change to record ever employee
			   $names=query($queryApplications2,$db);
			    while ($rowII=$names->fetch_assoc())
				{
						echo $rowII["EverEmployee"];
						echo " <br>Name= ";
						$queryApplications3="SELECT FirstName, LastName FROM userlogin WHERE UserID=". $rowII["UserID"];
						$names2=query($queryApplications3,$db);
						while($rowIII=$names2->fetch_assoc())
						{
							echo $rowIII["FirstName"];
							echo " ";
							echo $rowIII["LastName"];
							echo"<br>----------------------------------";
						}
						// Final LOOP !! Gets The Actual Name
				}
					
			}
			
			?>
			</td>
			</tr>
	<?php
	} ?>
</table>
<?php
    mysqli_free_result($JobResult);
	include("include/Footer.php");   
?>
