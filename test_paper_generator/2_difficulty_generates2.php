<?php
		
		include_once '../config.php';
		
		$uid=$_GET['unique_id'];
		$uid2=substr($uid, 0, -1);
		//echo $uid2;
		$lst = explode(",", $uid2);
		echo "<table>";
		$i=1;
		/*$j=1;
		$k=1;
		$p="";
		$q="";*/
		$total;
		$total_student_count=0;
		foreach($lst as $item) 
		{
			$result=mysql_query("SELECT COUNT(ov.StudentId)
			FROM onlinequestionbank ob,onlineuniqid oq,objective_evolution ov
			WHERE oq.UniqId='$item' AND ob.UniqId=oq.Uniqid AND oq.TestID=ov.QuePaperId AND ov.absent=0");
			$row=mysql_fetch_array($result);
			$count=$row[0];
			
			$result1=mysql_query("SELECT oq.Qno,oq.Uniqid,oq.TestID,ov.StudentId,ov.unans_str,ov.incorr_str,ov.uniqid_str 
			FROM onlinequestionbank ob,onlineuniqid oq,objective_evolution ov
			WHERE oq.UniqId='$item' AND ob.UniqId=oq.Uniqid AND oq.TestID=ov.QuePaperId AND ov.absent=0");
			$total_student_count=0;
			while($row1=mysql_fetch_array($result1))
			{
				$count1=$row1[4];
				$count2=$row1[5];
				$count3=$row1[0];
				$count4=$row1[6];
				if($count4 == "")
				{
					$lst1 = explode(",", $count1);
					foreach($lst1 as $item1) 
					{
						if($item1 ==  $count3)
						{
							$total_student_count++;
						}
					}
					$lst2 = explode(",", $count2);
					foreach($lst2 as $item2) 
					{
						if($item2 ==  $count3)
						{
							$total_student_count++;
						}
					}
				}
				else
				{
					$lst4 = explode(",", $count4);
					foreach($lst4 as $item4) 
					{
						if($item4 ==  $count4)
						{
							$total_student_count++;
						}
					}
				}
			}
			if($count!=0){
				$total = round(((float)($total_student_count*100)/$count),2);
			}
			else{
				$total=0;
			}
			echo "<tr>";
				echo "<td style='width:150px;border:solid 0px;'><input type='checkbox' name='$i' id='$item' class='ck' value='$i' />".$i."</td>";
				echo "<td style='width:160px;border:solid 0px;'>$total%</td>";
				echo "<td style='width:50px;border:solid 0px;'>$count</td>";
			echo "</tr>";
			$i++;
		}
		echo "</table>";
		include_once '../conn_close.php';
?>