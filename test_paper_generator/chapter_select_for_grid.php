<?php
	
		include_once '../config.php';
		
		$sub=$_GET['sub_id'];
		$std=$_GET['std'];
		$board=$_GET['board_id'];
		$result=mysql_query("select ch_no,name,id from chapter where sub_id IN 
							(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub')
							AND board_id IN (SELECT board_id FROM student_details WHERE board_id='$board') 
							AND standard_id IN 
							(SELECT standard_id FROM student_details WHERE standard_id='$std')
							AND active=1 order by ch_no ");
		
		$rw = mysql_num_rows($result);
		echo "<table>";
		if($rw == 0)
		{
			echo "<tr>";
			echo "<td>No Data Available.<td>";
			echo "<tr>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				
				echo "<tr>";
				echo "<td><input type='checkbox' name='' id='' class='chk' value='' /></td>";
				echo "<td value=$row[0]-$row[2]>$row[0] - $row[1]</td>";
				echo "</tr>";
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>