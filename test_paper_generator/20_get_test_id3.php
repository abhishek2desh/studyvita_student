<?php 
	
	include_once '../config.php';
	
	$fac_id = $_GET['uid'];
	$sub_id = $_GET['sub_id'];
	$test_type = $_GET['test_type'];
	$sqlstr="";
	$dt1 = $_GET['dt1'];
	$dt2 = $_GET['dt2'];
	if($test_type=="0")
	{
	$sqlstr= " And ( test_type='online_test' or test_type='adaptive_test')";
	}
	else if($test_type=="1")
	{
	$sqlstr= " And  test_type='adaptive_test'";
	}
	else if($test_type=="2")
	{
	$sqlstr= " And  test_type='online_test'";
	}
	else
	{
	}
	if($dt1!="" & $dt12!="")
	{
	$sqlstr=$sqlstr. " And  DATE_FORMAT(DATE(start_time),'%Y-%m-%d') BETWEEN '$dt1' AND '$dt2'";
	}
	session_start();
	
	$batch_id=$_SESSION['batch_id'];
	if($sub_id =="")
	{
	$result=mysql_query("SELECT test_id,DATE_FORMAT(DATE(start_time),'%d-%m-%Y'),subject FROM adaptive_learning_test WHERE student_id='$fac_id' AND Test_submit='1' AND batch_id='$batch_id' $sqlstr order by test_id desc");
	
	}
	else
	{
	$result=mysql_query("SELECT test_id,DATE_FORMAT(DATE(start_time),'%d-%m-%Y'),subject FROM adaptive_learning_test WHERE student_id='$fac_id' AND Test_submit='1' AND subject='$sub_id'  AND batch_id='$batch_id' $sqlstr order by test_id desc");

	}
	echo "<option value='0'>Select TestID</option>";
	while($row=mysql_fetch_array($result))
	{
	$subject="";
	$result1=mysql_query("select name from subject where id='$row[2]'");
	while($row1=mysql_fetch_array($result1))
	{
	$subject=$row1[0];
	}
		echo "<option value='$row[0]'>$row[0] [$row[1]] [$subject]</option>";
	}
	include_once '../conn_close.php';
?>