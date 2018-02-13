<?php
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id1'];
	$uid=$_GET['uid'];
	$sub=$_GET['sub'];
	
	$sb_select_name=$_GET['sb_select_name'];
	
	
	if($sub == "")
	{
		if($sb_select_name == 'Mock')
		{
			$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om WHERE atr.test_id=om.TestID AND atr.test_id='$get_test_id' AND atr.student_id='$uid' AND om.Qno=atr.Qno ORDER BY atr.Qno");
		}
		else
		{
			$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om WHERE atr.test_id=om.TestID AND om.SubID='$sub' AND atr.test_id='$get_test_id' AND atr.student_id='$uid' AND om.Qno=atr.Qno ORDER BY atr.Qno");
		}
	}
	else
	{
		if($sb_select_name == 'Mock')
		{
			$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om WHERE atr.test_id=om.TestID AND atr.test_id='$get_test_id' AND atr.student_id='$uid' AND om.Qno=atr.Qno ORDER BY atr.Qno");
		}
		else
		{
			$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om WHERE atr.test_id=om.TestID AND om.SubID='$sub' AND atr.test_id='$get_test_id' AND atr.student_id='$uid' AND om.Qno=atr.Qno ORDER BY atr.Qno");
		}
	}
	$rw=mysql_num_rows($result);
	
	if($rw == "")
	{
		//echo "Failed";
	}
	else
	{
		echo $rw;
	}
	
	include_once '../conn_close.php';
?>