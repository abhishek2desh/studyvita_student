<?php
	include 'config.php';
	
	//$uid=$_GET['uid'];
	$result=mysql_query("SELECT date_formula from server_date_formula where active='1'");
	$formula=0;
	while($row=mysql_fetch_array($result))
	{
	$formula=$row[0];
	}
	echo $formula."<br/>";
	$currentDate = strtotime(date("Y-m-d H:i:s"));
	//$futureDate = $currentDate+(60*570.100002);
	//$futureDate = $currentDate+(37810);
	$futureDate = $currentDate+($formula);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	echo $formatDate;
?>