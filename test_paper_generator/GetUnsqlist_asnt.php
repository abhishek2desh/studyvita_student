<?php
	
		include_once '../config.php';
		$assignment_id=$_GET['assignment_id'];
		$test_id=$_GET['test_id'];
		$uid=$_GET['uid'];
		$unans=$_GET['unans'];
		$lst = explode(",", $unans);
		echo "<table style='width:100%;border:solid 2px;'>";
			echo "<tr><th style='border:solid 1px;width:40%;'>Qno</th>";
						
							echo "<th style='border:solid 1px;width:30%;'>Your Answer</th>";
							echo "<th style='border:solid 1px;width:30%;'>Correct Answer</th></tr>";
		foreach($lst as $item) 
		{
	$result=mysql_query("SELECT test_id,Qno,Uniq_id,response,correct_ans FROM `personalassignment_response` WHERE test_id='$test_id' AND user_id='$uid' AND assignment_id='$assignment_id' and Qno='$item'");
		
		while($row=mysql_fetch_array($result))
		{
				echo "<tr style='background-color:#A9E2F3;'>";
				
					echo "<td style='border:solid 0px;width:40%;'><input type='radio' name ='name_mmy' id='$row[2]-$row[1]' class='chk' value='$row[2]'/>$row[1]</td>";
						
			echo "<td  align='center' style='border:solid 0px;'>".$row[3]."</td>";
				echo "<td align='center' style='border:solid 0px;'>".$row[4]."</td>";
				
				echo "</tr>";
					
		}
		
		}
		echo "</table>";
?>