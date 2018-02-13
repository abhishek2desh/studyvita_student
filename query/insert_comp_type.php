<?php 
	include_once '../config.php';

	$text_comptype = $_GET['text_comptype'];
	$fac_id = $_GET['fac_id'];
	$result=mysql_query("SELECT DISTINCT id,name FROM competition_type  where name='$text_comptype'");
	$rw=mysql_num_rows($result);
	if($rw==0)
	{
	$SQL = "INSERT INTO competition_type 
			(`name`,`user_id`) VALUES
			('$text_comptype','$fac_id')";
			
			$result1 = mysql_query($SQL);
			if ($result1)
			{
			echo "Success";
			}
			else
			{
			echo "failed";
			}
	}
	else
	{
	}
?>