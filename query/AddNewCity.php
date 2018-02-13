<?php 
	include_once '../config.php';

	$cityname=$_GET['text_city1'];
	
	
		$SQL = "INSERT INTO city
		(`name`) VALUES
		('$cityname')";
		//echo $SQL;
		$result = mysql_query($SQL);
		if ($result)
		{
			echo "Success";
		}
		else
		{
			echo "Error while Inserting city";
		}
	
	
	
?>