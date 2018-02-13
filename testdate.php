<?php
	
	
	
	
	$currentDate = strtotime(date("Y-m-d H:i:s"));
	//$futureDate = $currentDate+(60*570.100002);
	//$futureDate = $currentDate+(37810);
	$futureDate = $currentDate+(34210);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	
	echo "<br/>".$currentDate;
	echo "<br/>".$futureDate;
	echo "<br/>".$formatDate;
	$today34 = date("Y-m-d H:i:s");
	echo "<br/>".$today34;
	?>