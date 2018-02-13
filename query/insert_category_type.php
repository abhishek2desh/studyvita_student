<?php 
	include_once '../config.php';

	$text_cat = $_GET['text_cat'];
	$fac_id = $_GET['fac_id'];
	$result=mysql_query("SELECT DISTINCT id,name FROM competition_category  where name='$text_cat'");
	$rw=mysql_num_rows($result);
	if($rw==0)
	{
	$SQL = "INSERT INTO competition_category 
			(`name`,`user_id`) VALUES
			('$text_cat','$fac_id')";
			
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