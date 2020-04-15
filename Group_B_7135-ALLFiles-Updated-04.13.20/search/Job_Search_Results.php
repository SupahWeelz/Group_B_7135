<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "se_jobsearchapp";
	
	$conn = mysqli_connect($servername, $username, $password,$db_name);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully.<br>";
	
	if ($result = $conn->query("SELECT DATABASE()")) {
		$row = $result->fetch_row();
		printf("Default database is: %s.", $row[0]);
		echo "<br>";
		$result->close();
	}
	
	$sql = "SELECT JobName,Description,Number_Available,Qualification,SalaryRange FROM job";
	$result = $conn->query($sql) or die($conn->error);
	
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Job Title: ".$row["JobName"]."<br>";
		echo "Description: ".$row["Description"]."<br>";
		echo "Positions Available: ".$row["Number_Available"]."<br>";
		echo "Qualifications: ".$row["Qualification"]."<br>";
		echo "SalaryRange: ".$row["SalaryRange"]."<br>";
    }
$conn->close();
?>