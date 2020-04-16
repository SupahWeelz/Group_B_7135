<?php

	include "include/Header.php";
	include "include/Config.php";
	//print_r($_POST);
	
	$status = $statusMsg = ''; 
	if(isset($_POST["submit"])){ 
		$status = 'error'; 
		if(!empty($_FILES["image"]["name"])) { 
			// Get file info 
			$fileName = basename($_FILES["image"]["name"]); 
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
			 
			// Allow certain file formats 
			$allowTypes = array('jpg','png','jpeg','gif'); 
			if(in_array($fileType, $allowTypes)){ 
				$image = $_FILES['image']['tmp_name']; 
				$imgContent = addslashes(file_get_contents($image)); 
			 
				// Insert image content into database
				$query="UPDATE userlogin SET ProfilePicture ='".$imgContent."' WHERE UserID=".$_SESSION["id"];
				$insert=Query($query,$db);
				 
				if($insert){ 
					$status = 'success'; 
					$statusMsg = "File uploaded successfully."; 
				}else{ 
					$statusMsg = "File upload failed, please try again."; 
				}  
			}else{ 
				$statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
			} 
		}else{ 
			$statusMsg = 'Please select an image file to upload.'; 
		} 
	} 
 
		// Display status message 
		echo $statusMsg; 
		echo "<script type='text/javascript'> document.location = 'Profile.php'; </script>";
	
	//$sql = "UPDATE userlogin SET ProfilePicture = '".$_POST["fileToUpload"]."' WHERE UserID=".$_SESSION['id'];
	//$result = Query($sql,$db);
	
	//if ($result === False){
	//	echo "Error uploading image!";
	//}
	//else{
	//	echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
	//}
	
	include "include/Footer.php";
?>