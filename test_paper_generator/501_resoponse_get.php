<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id'];
		$uid=$_GET['uid'];
		$qno=$_GET['qno'];
		$assignment_id=$_GET['assignment_id'];
		$qno=$qno+1;
		
		$result=mysql_query("SELECT test_id,Qno,Uniq_id,response,correct_ans FROM `personalassignment_response` WHERE test_id='$test_id' AND student_id='$uid' AND Qno='$qno' AND assignment_id='$assingment_id'");
		$rw = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		$response_id=$row[3];
		$correct_id=$row[4];
		if($response_id == $correct_id)
		{
			
		}
		else if($response_id == 'x') 
		{
			
		}
		else 
		{
			echo "Your Response:".$response_id;
		}
		
?>