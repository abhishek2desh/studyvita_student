<?php
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id'];
	$uid=$_GET['uid'];
	$green="";
	$new_val=0;
	$str="";
	$i=0;
	
	$result_sub=mysql_query("SELECT s.name FROM adaptive_learning_test adt,SUBJECT s WHERE adt.subject=s.id AND adt.test_id='$get_test_id' AND adt. student_id='$uid'");
	
	$row_sub=mysql_fetch_array($result_sub);
	$subject_22=$row_sub[0];
	$result=mysql_query("SELECT test_id,Uniq_id,Qno,response FROM `adaptive_test_response` WHERE test_id='$get_test_id' AND student_id='$uid' order by Qno");
	$rw=mysql_num_rows($result);
	echo "<table>";
	if($rw == "")
	{
		echo "This Test ID ";
	}
	else
	{
		while($row=mysql_fetch_array($result))
		{
			if($row[3] == 'x')
			{
				if($new_val == 3)
				{
					$new_val=0;
					$new_val++;
					echo "</tr>";
					echo "<tr>";
					echo "<td><input type='radio' name ='name_jee' id='$row[1]-$i' class='' value='$row[2]' /><font size='4em' >".$row[2]."</font></td>";
					echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
				}
				else
				{
					$new_val++;
					echo "<td><input type='radio' name ='name_jee' id='$row[1]-$i' class='' value='$row[2]' /><font size='4em' >".$row[2]."</font></td>";
					echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
				}
				$i++;
			}
			else
			{
				if($new_val == 3)
				{
					$new_val=0;
					$new_val++;
					echo "</tr>";
					echo "<tr>";
					echo "<td><input type='radio' name ='name_jee' id='$row[1]-$i' class='' value='$row[2]' /><font size='4em' >".$row[2]."</font></td>";
					echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
					//$str=$str.$get_test_id.",";
					$green=$green.$row[1].",";
				}
				else
				{
					$new_val++;
					echo "<td><input type='radio' name ='name_jee' id='$row[1]-$i' class='' value='$row[2]' /><font size='4em' >".$row[2]."</font></td>";
					echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
					$green=$green.$row[1].",";
				}
				$i++;
			}
		}
		echo "<table><tr>";
		echo "<td id='first_td_1_1' value='$green' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "</tr></table>";		
	}
	echo "</table>";
	include_once '../conn_close.php';
?>