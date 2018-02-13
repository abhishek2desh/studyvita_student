<?php 
	
	include_once '../config.php';
	
	$course_id = $_GET['course_id'];
	$tp = $_GET['tp'];
	$uid = $_GET['uid'];
	$batch_id = $_GET['batch_id'];
	if($tp == 1)
	{
		$result=mysql_query("SELECT DISTINCT b.id,b.name,b.standard_id,b.board_id FROM student_registered_course str,course c,USER u,batch b WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$uid' AND course_id='$course_id' AND b.id=str.batch_id");
		
		echo "<option value='0'>Select Batch</option>";
		$rw = mysql_num_rows($result);
		if($rw==0)
		{
		
$result3=mysql_query("SELECT b.id,b.name,s.user_id FROM batch b,student_details s,course_type_mapping ct WHERE s.user_id='$uid' AND b.id=s.batch_id AND b.course_type_mapping_id=ct.id AND ct.course_id='$course_id'");
				while($row3=mysql_fetch_array($result3))
			{
				echo "<option value='$row3[0]'>$row3[1]</option>";
			}
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				echo "<option value='$row[0]'>$row[1]</option>";
			}
		}
		
	}
	else if($tp == 2)
	{
		$result_link1=mysql_query("SELECT SUBJECT FROM course WHERE id='$course_id'");
		$res_row=mysql_fetch_array($result_link1);
		$sb_mn=substr($res_row[0], 0, -1);
		$lst = explode(",", $sb_mn);
		echo "<option value=''>Select Subject</option>";
		foreach($lst as $item) 
		{
			$result_link11=mysql_query("SELECT id,name FROM subject WHERE id='$item'");
			$res_row1=mysql_fetch_array($result_link11);
			if($res_row1[1]=="All")
			{
			echo "<option value='$res_row1[0]'>Mock</option>";
			}
			else
			{
			echo "<option value='$res_row1[0]'>$res_row1[1]</option>";
			}
			
			
		}
	}
	else if($tp == 10)
	{
		$result=mysql_query("SELECT b.id,b.name,b.standard_id,b.board_id,bsp.Batch_Desc FROM batch b,course_type_mapping ctm,course c,batch_school_map bsp WHERE ctm.id=b.course_type_mapping_id AND c.id=ctm.course_id AND c.id='$course_id' AND bsp.batch_id=b.id");
		
		echo "<option value='0'>Select Batch</option>";
		while($row=mysql_fetch_array($result))
		{
			echo "<option value='$row[0]'>$row[1]</option>";
		}
	}
?>