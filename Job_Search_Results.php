<?php
	include "include/Header.php";
	include "include/Config.php";
	
	$sql = "SELECT JobID,JobName,Description,Number_Available,Qualification,SalaryRange FROM job";
	$result = query($sql,$db);
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 'Job Title:'.$row['JobName'].'<br>';
		echo 'Description:  '.$row['Description'].'<br>';
		echo 'Positions Available: '.$row['Number_Available'].'<br>';
		echo 'Qualifications: '.$row['Qualification'].'<br>';
		echo 'SalaryRange: '.$row['SalaryRange'].'<br>';
		
		// Button for applying
		echo '<form method="POST" action="Process_Application_A.php">';
		echo '<input type="hidden" name="jobId" value="'.$row['JobID'].'">';
		echo '<input type="submit" value="Apply"></button>';
		echo '</form>';
    }
include "include/Footer.php";
?>