<?php
	
		include_once '../config.php';
		$total_que_str=$_GET['total_que_str'];
		
		//echo "Str  : ".$total_que_str;
		$chek_name=$_GET['chek_name'];
		$req_que=$_GET['req_que'];
		$total_que_str=substr($total_que_str, 0, -1);
		$uniq_id_get=$_GET['uniq_id_get'];
		$marks_for_review=$_GET['marks_for_review'];
		$marks_for_atm=$_GET['marks_for_atm'];
		$total_no_que=$_GET['total_no_que'];
		$i=1;
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		$lst = explode(",", $total_que_str);
		$new_val=0;
		echo "<table>";
		foreach($lst as $item) 
		{
			if($new_val == 3)
			{	
				$new_val=0;
				$new_val++;
				echo "</tr>";
				echo "<tr>";
				//echo "<td></td>";
				echo "<td><input type='radio' name ='name_que' id='$item-$i' class='chk' value='$item' /><font size='4em' >$i </font></td>";
				$item1="";
				$item1=",".$item.",";
				/*if(strpos($coma1,$item1) !== false)
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
				}*/
				if(strpos($coma1,$item1) !== false)
						{
							echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						else if(strpos($coma,$item1) !== false)
						{
							echo "<td><div style='background-color:yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						else
						{
							echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
			}
			else
			{
				$new_val++;
				echo "<td><input type='radio' name ='name_que' id='$item-$i' class='chk' value='$item' /><font size='4em' >$i </font></td>";
				$item1="";
				$item1=",".$item.",";
				if(strpos($coma1,$item1) !== false)
						{
							echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						else if(strpos($coma,$item1) !== false)
						{
							echo "<td><div style='background-color:yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						else
						{
							echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
			}
			$i++;
		}
		echo "</table>";
		include_once '../conn_close.php';
?>