<?php
	include("include/Header.php");
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	  
		// username and password sent from form 
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
		
		// query to validate username and password inputs
		$sql = 'SELECT ID FROM userlogin WHERE username = "'.$myusername.'" AND password = "'.$mypassword.'"';
		$result = mysqli_query($db,$sql) or die('Error executing query: '.mysqli_error($db));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
		$count = mysqli_num_rows($result);
		
		// checks if there's a match and sets session variables
		if($count == 1) {
			$_SESSION['id'] = $row["ID"];
			$_SESSION['username'] = $myusername;
			$_SESSION['loggedin'] = True;
			header("location: Index.php");
		}
		else {
			echo "Your Username or Password is invalid";
		}
	}
?>
  <!login pop up codes..............................................................................>
                    <div id="login">
                      <lable color:"white">Alreay have an account? Log in here</lable>
                    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

                  	<div id="id01" class="modal">

                  	  <form class="modal-content animate" action="/action_page.php" method="post">
                  	    <div class="imgcontainer">
                  	      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                  	      <img src="images/avatar2.png" alt="Avatar" class="avatar"/>
                  	    </div>

                  	    <div class="container">
                  	      <label for="uname"><b>Username</b></label>
                  	      <input type="text" placeholder="Enter Username" name="uname" required/>

                  	      <label for="psw"><b>Password</b></label>
                  	      <input type="password" placeholder="Enter Password" name="psw" required/>

                  	      <button type="submit">Login</button>
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
