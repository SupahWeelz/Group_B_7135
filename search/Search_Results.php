<!--	Given a string of text, scan database for keywords that contain the string.-->
<?php
	include("include/Header.php");
	include("include/Config.php");
	include("KMP.php");
	
	$P=$_GET["search"];
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
		$match=substr($T,$K,strlen($P));
		// If there is a match, add current job id to list
		if ($match >= 0){
			array_push($listJobs,$row['JobID']);
		}
	}
	
	// Base query DO NOT CHANGE
	$getIds2="SELECT JobName,JobDescription FROM job WHERE JobID=";
	
	echo "<table><tr><th>Job Title</th><th>Job Description</th></tr>";
	for ($i=0; $i < sizeof($listJobs); $i=$i+1){
		$temp=$getIds2.$listJobs[$i];
		$tempResult=Query($temp,$db);
		$tempRow=mysqli_fetch_assoc($tempResult);
		echo "<tr><td>".$tempRow["JobName"]."</td><td>".$tempRow["JobDescription"]."</td></tr>";
	}
	echo "</table>";
	
	include("include/Footer.php");
?>
