<?php
	include("include/Header.php");
	include "include/Config.php";
	//print_r($_SESSION);

?>
  <!login pop up codes..............................................................................>
                    
					<div id="login">
					  
					<?php
						if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
							echo '<button onclick="window.location.replace(\'Logout.php\');" style="width:auto;">Logout</button>';
						}
						else{
							echo '<p>Alreay have an account? Log in here</p>';
							echo '<button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Login </button> <br/>';
							echo '<p>New user? Register here</p>';
							echo '<button onclick="document.location=\'Register.php\'" style="width:auto;">Register</button>';
						}
					?>
					<!--
                    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
					
					<button onclick="window.location.replace('Logout.php');" style="width:auto;">Logout</button>
					-->
                  	<div id="id01" class="modal">

                  	  <form class="modal-content animate" action="Login.php" method="post">
                  	    <div class="imgcontainer">
                  	      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                  	      <img src="images/avatar2.png" alt="Avatar" class="avatar"/>
                  	    </div>

                  	    <div class="container">
                  	      <label for="uname"><b>Username</b></label>
                  	      <input type="text" placeholder="Enter Username" name="uname" required/>

                  	      <label for="psw"><b>Password</b></label>
                  	      <input type="password" placeholder="Enter Password" name="psw" required/>

                  	      <button type="submit" onclick="window.location.href = 'Profile.php';">Login</button>

                  	      <label>
                  	        <input type="checkbox" checked="checked" name="remember"/> Remember me
                  	      </label>
                  	    </div>

                  	    <div class="container" style="background-color:#f1f1f1">
                  	      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                  	      <span class="psw">Forgot <a href="#">password?</a></span>
                  	    </div>
                  	  </form>
                  	</div>

                  	<script>
                  	// Get the modal
                  	var modal = document.getElementById('id01');

                  	// When the user clicks anywhere outside of the modal, close it
                  	window.onclick = function(event) {
                  	    if (event.target == modal) {
                  	        modal.style.display = "none";
                  	    }
                  	}
                  	</script>
                  </div>

<!login pop up code ends here.......................................................................................>

<?php
	include("include/Footer.php");
?>


