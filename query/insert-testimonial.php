<?php 
	include_once '../config.php';
			

	
	$uid=$_GET['uid'];
	$text_matter=$_GET['text_matter'];
	
	$sql = "insert into testimonial(`user_id`,`matter_text`)values('$uid','$text_matter')";
	//echo $sql;
		$result = mysql_query($sql);
		if ($result)
		{
			


	
			
		}
		else
		{
			echo "Failed";
		}
?>