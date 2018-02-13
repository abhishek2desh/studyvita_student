<?php 

	include_once '../config.php';
	
	$test_id = $_GET['test_id'];
	$result=mysql_query("select noq from adaptive_learning_test where test_id='$test_id'");
	$row=mysql_fetch_array($result);
	$get_total_question=$row[0];
	$result1=mysql_query("select count(*) from adaptive_test_response where test_id='$test_id'");
	$row1=mysql_fetch_array($result1);
	$get_total_question1=$row1[0];
	echo "<div style='color:Blue'>Total : ".$get_total_question."</div><div style='color:red'>Wrong : ".$get_total_question1."</div>";
    include_once '../conn_close.php';
?>