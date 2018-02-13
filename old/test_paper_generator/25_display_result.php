<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id'];
		$uid=$_GET['uid'];
		
		$correct="";
		$incorrect="";
		$unans="";
		
		$result=mysql_query("SELECT `noq`,`correct_total_qus`,`incorrect_total_qus`,`Unattempt_total_qus` FROM `adaptive_learning_test`	WHERE test_id='$test_id' AND student_id='$uid'");
		$rw = mysql_num_rows($result);
		
		$row=mysql_fetch_array($result);
		$noq=$row[0];
		$crt=$row[1];
		$incrt=$row[2];
		$unat=$row[3];
		
		echo "<table ><tr><td style='padding-left:20px;color:black'>Total Qus. : $noq</td><td style='padding-left:20px;color:green'>Correct Qus. : $crt</td><td style='padding-left:20px;color:red'>Incorrect Qus. : $incrt</td><td style='padding-left:20px;color:blue'>Unattempted Qus. : $unat</td></tr></table>";
		
		//include_once '../conn_close.php';
?>