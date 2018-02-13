<?php
	include_once 'config.php';
	session_start();
	$user_id='3214';
	$filename="";
	
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{ 
		$file_name=$_FILES["file"]["name"];
		
		move_uploaded_file($_FILES["file"]["tmp_name"],
		"C:\\xampp\\htdocs\\StudentPhotos\\" . $_FILES["file"]["name"]);
		
		$rs6=mysql_query("UPDATE USER SET user_photo='$file_name' WHERE id='$user_id'");
		if($rs6)
		{
			$message="Your photo successfully upload, Thank You";
			echo "<script language=javascript> alert('$message');</script>"; 
			echo '<SCRIPT LANGUAGE="JavaScript">
			document.location.href="insrtuction_part.php" </SCRIPT>';
		}
		else
		{
			//echo "Paper Generation Failed";
		}
		
	}
	
?>