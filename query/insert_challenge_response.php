<?php
	include_once '../config.php';
	$uniqid=$_GET['uniqid'];
	$userid=$_GET['userid'];
	$select_ans_wise=$_GET['select_ans_wise'];
	$result=mysql_query("SELECT id FROM `today_challenge_response` WHERE user_id='$userid' AND uniq_id='$uniqid'");
	$rw = mysql_num_rows($result);
	if($rw==0)
	{
		$correct_ans="";
		$result1=mysql_query("SELECT correctans FROM `onlinequestionbank` WHERE uniqid='$uniqid'");
		while($row1=mysql_fetch_array($result1))
		{
		$correct_ans=$row1[0];
		}
		$SQL1_chalg = "INSERT INTO today_challenge_response 
				(`user_id`,`uniq_id`,response,correct_ans) VALUES
				('$userid','$uniqid','$select_ans_wise','$correct_ans')";
				
				$result1_chalg = mysql_query($SQL1_chalg);
				if ($result1_chalg)
				{
				}
				else
				{
					echo "Failed.Try after sometime";
				}
	}
	else
	{
	echo "Record already exist";
	}
?>