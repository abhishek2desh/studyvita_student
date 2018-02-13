<?php

	include_once '../config.php';
	
	$text_id= $_POST['text_id'];
	$youid= $_POST['youid'];
	$sql_cv = "INSERT INTO 
	user_talent_youtube_link(`user_talent_id`,`link`)VALUES('$text_id','$youid')";
	$result_cv = mysql_query($sql_cv);
	if($result_cv)
	{
	}
	else
	{
	echo "failed";
	}
?>