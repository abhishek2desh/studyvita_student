<?php
		include_once '../config.php';
		
		$srno=$_GET['srno'];
		
		$result11=mysql_query("SELECT MaterialName FROM `document_manager_subjective` WHERE srno='$srno'");
		$row11=mysql_fetch_array($result11);
		echo $row11[0];
			//include '../conn_close.php';
?>