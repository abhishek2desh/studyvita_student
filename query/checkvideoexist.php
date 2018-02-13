<?php

	include '../config.php';
	$video_id = $_GET['videoUrl'];
	$result=mysql_query("SELECT link_name FROM `suggested_link_library` WHERE id='$video_id' ");
while($row=mysql_fetch_array($result))
{
$videoUrl=$row[0];
}
	//$videoUrl= $_POST['videoUrl']='https://www.youtube.com/watch?v=g-jwWYX7Jlo';	
	$videoJson = "http://www.youtube.com/oembed?url=$videoUrl&format=json";
	$headers = get_headers($videoJson);
	$code = substr($headers[0], 9, 3);
	if ($code != "404")
	{
	echo "1"; //exist
	$SQL_sq1 = "UPDATE suggested_link_library SET link_not_exist='0' WHERE id='$video_id' ";
				$result_sq1 = mysql_query($SQL_sq1);
				if ($result_sq1)
				{
				}
				else
				{
				}
	}
	else
	{
	echo "0";
	$SQL_sq1 = "UPDATE suggested_link_library SET link_not_exist='1' WHERE id='$video_id' ";
				$result_sq1 = mysql_query($SQL_sq1);
				if ($result_sq1)
				{
				}
				else
				{
				}
	}
?>