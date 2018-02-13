<?php 
	
	include_once '../config.php';
	
	$course_id = $_GET['course_id'];
	$tp = $_GET['tp'];
	$uid = $_GET['uid'];
	$batch_id = $_GET['batch_id'];
	$result_link1=mysql_query("SELECT SUBJECT FROM course WHERE id='$course_id'");
		$res_row=mysql_fetch_array($result_link1);
		$sb_mn=substr($res_row[0], 0, -1);
		$lst = explode(",", $sb_mn);
		$count=0;
		foreach($lst as $item) 
		{
			if($item=="")
			{
			}
			else
			{
			$result_link11=mysql_query("SELECT id,name FROM subject WHERE id='$item'");
				$res_row1=mysql_fetch_array($result_link11);
				if($res_row1[1]=="All" || $res_row1[1]=="mock" || $res_row1[1]=="Mock")
				{
				
				}
				else
				{
				$count=$count+1;
				}
			}
			
			
			
		}
		echo $count;
?>