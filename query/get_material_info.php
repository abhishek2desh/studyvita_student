<?php
		include_once '../config.php';
		
		$document_name=$_GET['document_name'];
		
		$result11=mysql_query("SELECT path,materialname,subject,srno FROM `document_manager_subjective` WHERE materialname='$document_name'");
		$row11=mysql_fetch_array($result11);
		echo $row11[0]."|".$row11[3]."|".$row11[1]."|".$row11[2];
			//include '../conn_close.php';
?>