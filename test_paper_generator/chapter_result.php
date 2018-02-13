<?php
	
		include_once '../config.php';
		session_start();
		$sub=$_GET['sb_result'];
		$std=$_SESSION['stnd1'];
		$std_result=$_GET['std_result'];
		//$board = $_SESSION['board'];
		
		$result=mysql_query("select ch_no,name,id from chapter where sub_id IN 
							(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub')
							AND board_id IN (SELECT board_id FROM student_details WHERE board_id='1') 
							AND standard_id IN 
							(SELECT standard_id FROM student_details WHERE standard_id='$std_result')
							AND active=1 order by ch_no ");
		
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
			echo "<option value=''>No Data Available.</option>";
		}
		else
		{
			echo "<option value=''>Select Chapter</option>";
		
			while($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[2]>$row[0] - $row[1]</option>";
			}
		}
		include_once '../conn_close.php';
?>