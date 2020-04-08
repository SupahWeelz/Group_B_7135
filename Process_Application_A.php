<?php 
	include "include/Header.php";
	include "include/Config.php";
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
				<?php 
					$jobid=$_POST["jobId"];
					echo '<input type="text" name="jobid" type="hidden" value='.$jobid.'>';
				?>
				
				<br/>
				
			<hr/>

			<button type="submit" class="registerbtn">Register</button>
		</div>
	</form>
<?php include "include/Footer.php";?>