<?php
	
		include_once '../config.php';
		
		
		$std=$_GET['text_std'];
		$board=$_GET['text_board'];
		$text_subject=$_GET['text_subject'];
		if($std>0 && $board>0 && $text_subject>0)
		{
		$result=mysql_query("SELECT DISTINCT id,name,ch_no FROM chapter  WHERE board_id='$board' AND standard_id='$std' AND (sub_id='$text_subject' or sub_id in(select distinct sub_id from subject_alias where rel_sub_id='$text_subject') ) AND active='1'");
		
		$rw = mysql_num_rows($result);
		echo "<table>";
		if($rw == 0)
		{
			echo "<tr><td>No Data Available.</td></tr>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
			echo "<tr>";
				//echo $row[0]."-".$row[1]."-".$row[2];
				echo "<td style='color:black;border:solid 0px;width:200px;'><input type='checkbox' name='name_ch_multi[]' id='$row[0]-$row[2]' class='ck' value='$row[0]' />".$row[1]."</td>";
			//echo "<option value=$row[0]-$row[1]-$row[2]>$row[1]</option>";
				echo "</tr>";
			}
		}
		echo "</table>";
		}
		else
		{
		echo "<table>";
		echo "<tr><td>No Data Available.</td></tr>";
		echo "</table>";
		}
		
		
		
		//include '../conn_close.php';
?>