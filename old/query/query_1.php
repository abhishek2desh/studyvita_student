<?php 
	session_start();
	
	include_once '../config.php';
	$SQL = "SELECT id,NAME AS chap_name FROM chapter WHERE sub_id=29"; 
	
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 

	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		echo "<li class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['chap_name']."</li>";
	} 
	include_once '../conn_close.php';
?>