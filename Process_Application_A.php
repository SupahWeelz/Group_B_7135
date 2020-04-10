<?php 
	include "include/Header.php";
	include "include/Config.php";

	//print_r($_POST);

?>
<form action="Process_Application_B.php" method="POST">
		<div class="container">
			<h1>Job Application</h1>
			<p>Please fill in this form.</p>
			<hr>
				<br/>
				
				<label for="justification"><b>Justification</b></label>
				<input type="text" name="justification" required="required"/>
				
				<br/>
				
				<label for="answer"><b>Answer</b></label>
				<input type="text" name="answer" required="required"/>
				
				<br/>
				
				<!-- Receives jobid and passes it to Process_Application_B.php -->
				
				<input name="jobId" type="hidden" value=<?php echo $_POST["jobId"]; ?>>

				
				<br/>
				
			<hr/>

			<button type="submit" class="submitbtn">Submit</button>
		</div>
	</form>
<?php include "include/Footer.php";?>