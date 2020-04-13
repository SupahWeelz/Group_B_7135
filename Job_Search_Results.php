<?php
	include "include/Header.php";
	include "include/Config.php";
	include "KMP.php" ;
	
	//print_r($_POST);
	$P=$_POST["Keyword"];
	$listJobs=array();
	
	// Gets job ids
	$getIds="SELECT JobID FROM job";
	$result=Query($getIds,$db);
	
	// Loops through all jobs
	while($row = mysqli_fetch_assoc($result)){
		// Gets key words from db
		$getKeywords="SELECT Keywords FROM job WHERE JobID=".$row['JobID'];
		$result2=Query($getKeywords,$db);
		$row2=mysqli_fetch_assoc($result2);
		//echo "Keywords: ".$row2["Keywords"]."<br>";
		
		// Tries to match search with keywords
		$T=$row2["Keywords"];
		$K=kmp($T,$P);
		//$match=substr($T,$K,strlen($P));
		// If there is a match, add current job id to list
		if ($K >= 0){
			array_push($listJobs,$row['JobID']);
		}
	}
	//echo sizeof($listJobs);
	
	$getIds2="SELECT JobID,JobName,JobDescription,Number_available,BasicQualifications,PreferredQualifications,SalaryRange FROM job WHERE JobID=";
	
	for ($i=0; $i < sizeof($listJobs); $i=$i+1){
		$temp=$getIds2.$listJobs[$i];
		$tempResult=Query($temp,$db);
		$tempRow=mysqli_fetch_assoc($tempResult);
		echo 'Job Title:'.$tempRow['JobName'].'<br>';
		echo 'Description:  '.$tempRow['JobDescription'].'<br>';
		echo 'Positions Available: '.$tempRow['Number_available'].'<br>';
		echo 'Basic Qualifications: '.$tempRow['BasicQualifications'].'<br>';
		echo 'PreferredQualifications: '.$tempRow['PreferredQualifications'].'<br>';
		echo 'SalaryRange: '.$tempRow['SalaryRange'].'<br>';
		
		// Button for applying
		echo '<form method="POST" action="Process_Application_A.php">';
		echo '<input type="hidden" name="jobId" value="'.$tempRow['JobID'].'">';
		echo '<input type="submit" value="Apply"></button>';
		echo '</form>';
	}
include "include/Footer.php";
?>