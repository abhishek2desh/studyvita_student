<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id'];
		$uid=$_GET['uid'];
		
		$correct="";
		$incorrect="";
		$unans="";
		
		$result=mysql_query("SELECT test_id,Qno,Uniq_id,response,correct_ans FROM `adaptive_test_response` WHERE test_id='$test_id' AND student_id='$uid'");
		$rw = mysql_num_rows($result);
		$new_val=0;
		echo "<table>";
		while($row=mysql_fetch_array($result))
		{
			if($new_val == 4)
			{
				$new_val=0;
				$new_val++;
				echo "</tr>";
				echo "<tr>";
				echo "<td><input type='checkbox' name ='$row[1]' id='$row[2]' class='chk' value='$row[2]' />$row[1]</td>";
				if($row[3] == 'x')
				{
					$unans=$unans.$row[1].",";
					echo "<td><div style='background-color:blue;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else if($row[3] == $row[4])
				{
					$correct=$correct.$row[1].",";
					echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else
				{
					$incorrect=$incorrect.$row[1].",";
					echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
			}
			else
			{
				$new_val++;
				echo "<td><input type='checkbox' name ='$row[1]' id='$row[2]' class='chk' value='$row[2]' />$row[1]</td>";
				
				if($row[3] == 'x')
				{
					$unans=$unans.$row[1].",";
					echo "<td><div style='background-color:blue;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else if($row[3] == $row[4])
				{
					$correct=$correct.$row[1].",";
					echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else
				{
					$incorrect=$incorrect.$row[1].",";
					echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
			}
		}
		echo "<table><tr>";
		echo "<td id='first_td_1' value='$correct' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "<td id='first_td_2' value='$incorrect' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "<td id='first_td_3' value='$unans' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "</tr></table>";
?>
<?php
	include 'conn_close.php';
?>