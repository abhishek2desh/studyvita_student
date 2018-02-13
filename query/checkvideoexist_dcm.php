<?php

	include '../config.php';
	$docid = $_GET['docid'];
	$result=mysql_query("SELECT path FROM `document_manager_subjective` WHERE srno='$docid' ");
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
	$SQL_sq1 = "UPDATE document_manager_subjective SET link_not_exist='0' WHERE id='$video_id' ";
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
	$SQL_sq1 = "UPDATE document_manager_subjective SET link_not_exist='1' WHERE id='$video_id' ";
				$result_sq1 = mysql_query($SQL_sq1);
				if ($result_sq1)
				{
				}
				else
				{
				}
	}
?>