<?php
			
	include '../config.php';
	
	$get_test_id1=$_GET['get_test_id1'];
	$qno=$_GET['qno'];
	
	$result_sub=mysql_query("SELECT sc.subject,sc.SubID FROM `omrcorrect` om,`subjectcode` sc WHERE sc.SubID=om.SubID AND om.TestID='$get_test_id1' AND om.Qno='$qno'");
	$row_sub=mysql_fetch_array($result_sub);
	$sb1=$row_sub[0];
	$sb2=$row_sub[1];
	echo $sb1."-".$sb2;
	
?>