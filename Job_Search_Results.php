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
		//print_r($tempRow);
		echo '<div class="Job_Search_Results">';
		echo '<b>Job Title:</b>'.' '.$tempRow['JobName'].'<br/>';
		echo '<b>Description: </b> '.$tempRow['JobDescription'].'<br/>';
		echo '<b>Positions Available:</b> '.$tempRow['Number_available'].'<br/>';
		echo '<b>Basic Qualifications: </b>'.$tempRow['BasicQualifications'].'<br/>';
		echo '<b>PreferredQualifications:</b> '.$tempRow['PreferredQualifications'].'<br/>';
		echo '<b>SalaryRange: </b>'.$tempRow['SalaryRange'].'<br/>';
		echo '</div>';


		// Button for applying
		echo '<form method="POST" action="Check_Application.php">';
		echo '<input type="hidden" name="JobID" value="'.$tempRow['JobID'].'"/>';
		echo '<button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Apply</button>';
		echo '</form>';
	}
include "include/Footer.php";
?>
