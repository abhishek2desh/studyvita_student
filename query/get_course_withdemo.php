<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$result=mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name 
				FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$uid' and str.status=1");
											
		$rw = mysql_num_rows($result);
		echo "<option value='0'>Select Course</option>";
		if($rw == 0)
		{
		
			//echo "<option value='0'>No Data Available.</option>";
				$totaltimes=0;
			$totaltimes1=0;
			$result1=mysql_query("SELECT c.id,c.name,s.total_times FROM course c,student_demo_course s WHERE  s.course_id=c.id and s.user_id='$uid' and c.id not IN(select distinct course_id from student_registered_course where user_id='$uid')");
			$rw1 = mysql_num_rows($result1);
			if($rw1 == 0)
			{
			
				echo "<option value='0'>No Data Available.</option>";
			}
			else
			{
		
				$cnt=0;
				while($row1=mysql_fetch_array($result1))
				{
				
					$totaltimes=$row1[2];
					$result2=mysql_query("SELECT course_times FROM `student_demo_criteria` ");
					while($row2=mysql_fetch_array($result2))
					{
						$totaltimes1=$row2[0];
					}
					if($totaltimes<$totaltimes1)
					{
					
						echo "<option value=$row1[0]>$row1[1]</option>";
						$cnt=$cnt+1;
					}
					else
					{
					
					}
					
				}
				if($cnt == 0)
				{
					echo "<option value='0'>No Data Available.</option>";
				}
			}
			
		}
		else
		{
		
			while($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[0]>$row[1]</option>";
			}
				$totaltimes=0;
			$totaltimes1=0;
			$result1=mysql_query("SELECT c.id,c.name,s.total_times FROM course c,student_demo_course s WHERE s.course_id=c.id and
			s.user_id='$uid' and c.id not IN(select distinct course_id from student_registered_course where user_id='$uid')");
			
			while($row1=mysql_fetch_array($result1))
			{
				$totaltimes=$row1[2];
				$result2=mysql_query("SELECT course_times FROM `student_demo_criteria` ");
				while($row2=mysql_fetch_array($result2))
				{
					$totaltimes1=$row2[0];
				}
				if($totaltimes<$totaltimes1)
				{
					echo "<option value=$row1[0]>$row1[1]</option>";
				}
				else
				{
				//echo "Please register for access";
				}
				
			}
			
		}
?>