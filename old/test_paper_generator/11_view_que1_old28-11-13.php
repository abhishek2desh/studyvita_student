<?php
	
		include_once '../config.php';
		$total_que_str=$_GET['total_que_str'];
		$req_que=$_GET['req_que'];
		$total_que_str=substr($total_que_str, 0, -1);
		$uniq_id_get=$_GET['uniq_id_get'];
		$marks_for_review=$_GET['marks_for_review'];
		$marks_for_atm=$_GET['marks_for_atm'];
		$total_no_que=$_GET['total_no_que'];
		$select_que_str="";
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		$lst = explode(",", $total_que_str);
		$i=1;
		$k=0;
		$new_val=0;
		echo "<table>";
		in1: if($k == $req_que)
			{
				goto out;
			}
			else
			{
				for ($j=1;$j<=$total_no_que;$j++)
				{
					
					$ran="";
					$ran=rand(1,$total_no_que);
					//$ran=$ran-1;
					$run2=",".$lst[$ran].",";
					$run1=",".$select_que_str;
					if(strpos($run1,$run2) !== false)
					{
					
					}
					else
					{
						if($new_val == 4)
						{	
							$new_val=0;
							$new_val++;
							echo "</tr>";
							echo "<tr>";
							
							$select_ran=$select_ran.$ran.",";
							$select_que_str=$select_que_str.$lst[$ran].",";
							
							echo "<td><input type='checkbox' name ='$i' id='$lst[$ran]' class='chk' value='$lst[$ran]' />$i</td>";
							
							$item1=",".$lst[$ran].",";
							if(strpos($coma1,$item1) !== false)
							{
								echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
							}
							else if(strpos($coma,$item1) !== false)
							{
								echo "<td><div style='background-color:yellow;border:solid 0px;width:20px;height:10px;'></div></td>";
							}
							else
							{
								echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
							}
							$i++;
							$k++;
						}
						else
						{
							$new_val++;
							$select_ran=$select_ran.$ran.",";
							$select_que_str=$select_que_str.$lst[$ran].",";
							echo "<td><input type='checkbox' name ='$i' id='$lst[$ran1]' class='chk' value='$lst[$ran]' />$i</td>";
							
							$item1=",".$lst[$ran].",";
							if(strpos($coma1,$item1) !== false)
							{
								echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
							}
							else if(strpos($coma,$item1) !== false)
							{
								echo "<td><div style='background-color:yellow;border:solid 0px;width:20px;height:10px;'></div></td>";
							}
							else
							{
								echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
							}
							$i++;
							$k++;
						}
					}
				}
				goto in1;
			}
			out:
		echo "</table>";
		echo "<table>";
			echo "<tr>";
				echo "<td id='sel_que' value='$select_que_str'></td>";
				echo "<td id='sel_que_ran' value='$select_ran'></td>";
			echo "</tr>";
		echo "</table>";
		include_once '../conn_close.php';
?>