<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id'];
		$uid=$_GET['uid'];
		$correct=$_GET['correct'];
		$lst = explode(",", $correct);
		echo "<table style='width:100%;border:solid 2px;'>";
			echo "<tr><th style='border:solid 1px;width:40%;'>Qno</th>";
						
							echo "<th style='border:solid 1px;width:30%;'>Your Answer</th>";
							echo "<th style='border:solid 1px;width:30%;'>Correct Answer</th></tr>";
		foreach($lst as $item) 
		{
		$result=mysql_query("SELECT test_id,Qno,Uniq_id,response,correct_ans FROM `adaptive_test_response` WHERE test_id='$test_id' AND student_id='$uid' and Qno='$item'");
		while($row=mysql_fetch_array($result))
		{
			echo "<tr style='background-color:#D0F5A9;'>";
					
						echo "<td style='border:solid 0px;width:30%;'><input type='radio' name ='name_mmy' id='$row[2]-$row[1]' class='chk' value='$row[2]'/>$row[1]</td>";
							$allq=$allq.$row[1].",";
			echo "<td  align='center' style='border:solid 0px;'>".$row[3]."</td>";
				echo "<td align='center' style='border:solid 0px;'>".$row[4]."</td>";
				
				echo "</tr>";
					
		}
		echo "<table><tr>";
		}
		
?>