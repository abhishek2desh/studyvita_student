<?php
	
		include '../config.php';
		
		$sb=$_GET['sb'];
		$user_id=$_GET['user_id'];
		
		$result_grp=mysql_query("SELECT edutech_student_id,b.name,b.id FROM student_details sd,batch b WHERE sd.user_id='$user_id' AND  b.id=sd.batch_id ");
		$row_grp=mysql_fetch_array($result_grp);
		$s3=$row_grp[0];
		$s4=$row_grp[1];
		$s5=$row_grp[2];
		$result=mysql_query("SELECT ob.StudentId,ob.QuePaperId,date_format(ob.ExamDate,'%d-%m-%Y'),sd.sname FROM objective_evolution ob,student_details sd WHERE ob.StudentId=sd.edutech_student_id AND data_source='evaldb1' AND ob.StudentId='$s3' AND ob.Subject='$sb' ORDER BY ExamDate");
		
		$rw = mysql_num_rows($result);
		
		if($rw == "")
		{
			echo "<option value='0'>No Data Available.</option>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				echo "<option value='$row[0]-$row[3]-$row[1]-$s4-$s5'>$row[1] - $row[2]</option>";
			}
		}
		
?>