<?php
	
		include_once '../config.php';
		session_start();
		$s5=$_SESSION['sid']='3214';
		$req_que=$_GET['req_que']='15';
		$total_que_str=$_GET['total_que_str']='27578,28755,7278,24309,24328,27582,36268,27586,27587,27597,26869,27579,28748,28749,8383,14720,26725,26456,26458,26464,26467,26470,27575,27580,27585,27591,27596,27770,27773,27776,28750,28756,36255,62749,30759,30774,9955,15784,15889,15910,15913,15909,15903,15902,15911,15017,27583,28753,28757,15765,15757,15897,15898,18079,21450,27777,27780,28539,36259,36260,62751,55894,55898,36258,55891,15760,15888,15904,27590,28548,28554,26862,9939,15900,26457,27576,27595,28564,36265,28546,27577,7265,8402,8381,9960,15887,21431,27581,27588,27589,27593,27764,27766,27772,27598,27767,27768,27778,27703,28540,36257,55901,15782,28552,36295,36310,55904,';
		$total_que_str=substr($total_que_str, 0, -1);
		$uniq_id_get=$_GET['uniq_id_get']='';
		$marks_for_review=$_GET['marks_for_review']='';
		$marks_for_atm=$_GET['marks_for_atm']='';
		$total_no_que=$_GET['total_no_que']='107';
		$cp_value12=$_GET['cp_value12']='381';
		$sub_id=$_GET['sub_id']='16';
		$select_que_str="";
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		
		$newString = str_replace(",","','",$total_que_str);
		
		$newString2 =  "'".$newString."'";
		
		echo $newString2;
		//$newString2=substr($newString, 0, -2);
		$avg_val="";
		$avg_count=mysql_query("SELECT Avg_percent FROM chapterwise_student_average WHERE chapter_id='$cp_value12' AND student_id='$s5'");
		$avg_count_rw = mysql_num_rows($avg_count);
		$avg_count_row=mysql_fetch_array($avg_count);
		$avg=$avg_count_row[0];
		echo $avg;
		
		$total_que_str="";
		$total_no_que="";
		$avg_val=$avg;
		ab:
		$avg_val=$avg_val+10;
		if($avg_val > 100)
		{
			$avg_val=100;
		}
		//echo "1st : ".$avg_val."<br/>";
		$ud_count=mysql_query("SELECT Per,UniqID FROM uniqidwise_diff_per WHERE UniqId IN ($newString2) AND per BETWEEN '$avg' AND '$avg_val'");
		$ud_rw = mysql_num_rows($ud_count);
		$total_no_que=$ud_rw;
		//echo "2nd : ".$ud_rw."<br/>";
		
		if($ud_rw >= $req_que)
		{
		}
		else
		{
			if($avg_val == 100)
			{
				/*$ud_count=mysql_query("SELECT Per,UniqID FROM uniqidwise_diff_per WHERE UniqId IN ($newString2)");
				$ud_rw = mysql_num_rows($ud_count);
				$total_no_que=$ud_rw;*/
				$message="No Questions are available with difficulty level greater than your average performance pick randomly";
				$message1="Only $ud_rw question are available with difficulty level greater than your average performance.";
				if($ud_rw == 0)
				{
					echo "<script language=javascript> alert('$message');</script>"; 
				}
				else
				{
					echo "<script language=javascript> alert('$message1');</script>"; 
				}
				
				
			}
			else
			{
				goto ab;
			}
		}
		while($df_row=mysql_fetch_array($ud_count))
		{
			$total_que_str=$total_que_str.$df_row[1].",";
		}
		
		$total_que_str=substr($total_que_str, 0, -1);
		$lst = explode(",", $total_que_str);
		$i=1;
		$k=0;
		$new_val=0;
		$avg_val="";
		echo "<table>";
		for ($j=0;$j<=$total_no_que;$j++)
		{
			if ($j==$req_que)
			{
				goto out;
			}
			in1:
			$ran="";
			$ran=rand(1,$total_no_que);
			$ran=$ran-1;
			$run2="";
			$run1="";
			$uq_get=$lst[$ran];
			$run2=",".$lst[$ran].",";
			$run1=",".$select_que_str;
			if(strpos($run1,$run2) !== false)
			{
					goto in1;
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
			}
		}
		out:
		echo "</table>";
		echo "<table>";
			echo "<tr>";
				echo "<td id='sel_que' value='$select_que_str'></td>";
				echo "<td id='sel_que_ran' value='$select_ran'></td>";
			echo "</tr>";
		echo "</table>";
?>