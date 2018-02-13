<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id'];
		$uid=$_GET['uid'];
		$allq=$_GET['allq'];
		$correct="";
		$incorrect="";
		$unans="";
		$allq="";
		$result=mysql_query("SELECT test_id,Qno,Uniq_id,response,correct_ans FROM `adaptive_test_response` WHERE test_id='$test_id' AND student_id='$uid'");
		$rw = mysql_num_rows($result);
		$new_val=0;
		echo "<table style='width:100%;border:solid 2px;'>";
			echo "<tr><th style='border:solid 1px;width:40%;'>Qno</th>";
						
							echo "<th style='border:solid 1px;width:30%;'>Your Answer</th>";
							echo "<th style='border:solid 1px;width:30%;'>Correct Answer</th></tr>";
		while($row=mysql_fetch_array($result))
		{
		
			
			
				
				
				
				if($row[3] == 'x')
				{
				echo "<tr style='background-color:#A9E2F3;'>";
					$unans=$unans.$row[1].",";
					echo "<td style='border:solid 0px;width:40%;'><input type='radio' name ='name_mmy' id='$row[2]-$row[1]' class='chk' value='$row[2]'/>$row[1]</td>";
					$allq=$allq.$row[1].",";
				}
				else if($row[3] == $row[4])
				{
				echo "<tr style='background-color:#D0F5A9;'>";
					$correct=$correct.$row[1].",";
						echo "<td style='border:solid 0px;width:30%;'><input type='radio' name ='name_mmy' id='$row[2]-$row[1]' class='chk' value='$row[2]'/>$row[1]</td>";
							$allq=$allq.$row[1].",";
				}
				else
				{
					echo "<tr style='background-color:#F78181;'>";
					$incorrect=$incorrect.$row[1].",";
						echo "<td style='border:solid 0px;width:30%;'><input type='radio' name ='name_mmy' id='$row[2]-$row[1]' class='chk' value='$row[2]'/>$row[1]</td>";
							$allq=$allq.$row[1].",";
				}
				echo "<td  align='center' style='border:solid 0px;'>".$row[3]."</td>";
				echo "<td align='center' style='border:solid 0px;'>".$row[4]."</td>";
				
				echo "</tr>";
					
		}
		/*echo "<table><tr>";
		echo "<td id='first_td_1' value='$correct' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "<td id='first_td_2' value='$incorrect' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "<td id='first_td_3' value='$unans' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "<td id='first_td_4' value='$allq' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "</tr></table>";*/
		include_once '../conn_close.php';
?>