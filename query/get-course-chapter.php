<?php
	include '../config.php';
	$sub_id=$_GET['sub_id'];
	$course_id=$_GET['course_id'];
	$text_unit=$_GET['text_unit'];
	$s5=$_GET['uid'];
	$batch_id=$_GET['batch_id'];
	$result1t=mysql_query("SELECT `tutor_id` FROM course WHERE id='$course_id'");
		$row1t=mysql_fetch_array($result1t);
		$course_tutor_id=$row1t[0];
		$result1t2=mysql_query("SELECT created_by FROM USER WHERE id='$s5'");
		$row1t2=mysql_fetch_array($result1t2);
		$student_tutor_id=$row1t2[0];
		if($course_tutor_id==$student_tutor_id)
		{
		$result=mysql_query("SELECT DISTINCT cc.chap_id,UCASE(c.name) FROM course_chapter cc,chapter c,course_batch_active_chapter cb WHERE cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$sub_id') AND c.id=cc.chap_id  AND c.unit_id='$text_unit' and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id' ORDER BY c.id ");
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT cc.chap_id,UCASE(c.name) FROM course_chapter cc,chapter c WHERE cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$sub_id') AND c.id=cc.chap_id  AND c.unit_id='$text_unit' ORDER BY c.id ");
		}	
	
	$rw = mysql_num_rows($result);
	echo "<option  value='0'>Select Chapter</option>";
	if($rw == 0)
	{
		echo "<option  value='0'>No Data Available.</option>";
	}
	else
	{
		while($row=mysql_fetch_array($result))
		{
			echo "<option  value=$row[0]>$row[1]</option>";
		}
	}
?>