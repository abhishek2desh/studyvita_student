<?php
	include '../config.php';
	$currentDate = strtotime(date("Y-m-d H:i:s"));
	echo $currentDate."<br/>";
	$futureDate = $currentDate+(60*570.100002);
	//$futureDate = $currentDate+(37810);
	echo $futureDate."<br/>";
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	?>