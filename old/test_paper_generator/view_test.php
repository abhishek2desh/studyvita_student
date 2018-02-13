<?php
	
		include_once '../config.php';
		$s5=$_GET['uid']='3214';
		$req_que=$_GET['req_que']='20';
		$uniq_id_get=$_GET['uniq_id_get']=0;
		$marks_for_review=$_GET['marks_for_review']='';
		$marks_for_atm=$_GET['marks_for_atm']='';
		$total_no_que=$_GET['total_no_que']='390';
		$cp_value12=$_GET['cp_value12']='382';
		$sub_id=$_GET['sub_id']='16';
		$select_que_str="";
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		
		$total_que_str=$_GET['total_que_str']='6346,63033,71001,15738,15783,15885,15899,15907,15914,28544,15766,14808,27708,28326,14814,28328,28558,70919,70924,27616,70905,36262,51868,55902,70881,70887,27720,55890,55897,27724,36264,36266,30505,62760,63034,63037,70897,71003,71051,70891,70925,70945,71010,71056,71069,70930,70959,70967,71000,71057,71061,70960,70971,70981,70985,71028,71065,63035,70974,13021,30527,71033,71050,71063,70977,6338,19453,28550,51866,51867,51869,15764,15769,15776,15777,15779,26459,26462,26468,26471,26472,26716,26723,26726,26727,26866,26873,26876,26877,28541,28553,28557,28559,28567,28751,28752,30755,30756,36256,36296,36297,55899,70880,70892,70894,70931,7267,9511,15780,27612,70890,70984,71008,71018,71020,71039,71047,71078,13020,15758,27611,70895,71046,71072,48882,55888,55900,62761,70882,70888,70909,71038,71052,71077,70921,71066,71068,15755,15756,15778,27606,14912,15112,15772,15773,26463,28549,51863,70918,9515,14432,14509,70915,70939,51878,70917,70932,70934,70940,70993,70998,6347,15767,15781,55893,15892,9140,14225,15912,28312,70937,70948,70907,70914,70916,51877,9513,28296,4518,8385,8386,14153,15891,15905,27600,27601,27602,27604,27607,27615,27620,27622,27700,27706,27709,27716,36298,62810,66356,27584,27613,28547,28556,14327,14817,27609,27610,27721,28325,27619,27711,27727,30508,30517,27705,27707,36267,15198,36317,48927,62792,66353,66354,70926,14408,14908,24310,27574,27605,27621,36316,66675,28299,28300,28302,28306,28310,28316,27718,28320,13018,27614,28323,51871,51873,6348,9163,13015,14248,14316,14719,14809,15893,15896,27712,27728,28330,51876,27702,62763,70899,62762,9048,18754,28543,28545,9039,15018,27713,27722,27725,27729,28287,28288,28290,28294,28295,28304,28305,28307,28309,28313,28314,28318,28324,28327,28551,28555,28563,30512,30524,51872,51875,51879,9927,30506,28291,28301,28311,28315,27618,27714,28292,28293,28297,30510,51880,30504,6337,15886,30522,7266,15890,15895,21636,27599,27608,27617,27723,27730,28289,28298,28303,28308,28561,30516,71253,55892,70904,70955,15762,15763,7263,15761,15771,15774,21451,21635,27603,27623,27699,27701,27704,27715,27717,28317,28319,28322,28560,30521,36261,36263,51862,70886,70912,27710,55895,48883,55896,71013,71014,71023,71026,71034,71035,71036,71067,30502,51874,62755,71045,70942,70943,70944,70958,70964,70965,71006,71011,71049,70973,70982,71062,70991,70992,70996,71029,71037,71048,71076,';
		
		$newString = str_replace(",","','",$total_que_str);
		$newString =  "'".$newString;
		$newString2=substr($newString, 0, -2);
		
		//echo $newString2;
		
		$avg=0;
		$avg_val=0;
		$ud_rw=0;
		//$ct="SELECT Avg_percent FROM chapterwise_student_average WHERE chapter_id='$cp_value12' AND student_id='$s5'";
		$avg_count=mysql_query("SELECT Avg_percent FROM chapterwise_student_average WHERE chapter_id='$cp_value12' AND student_id='$s5'");
		$avg_count_rw = mysql_num_rows($avg_count);
		$avg_count_row=mysql_fetch_array($avg_count);
		$avg=$avg_count_row[0];
		
		if($avg == "")
		{
			$avg=0;
		}
		//echo $avg."<br/>";
		$total_que_str="";
		$total_no_que="";
		$avg_val=$avg;
		ab:
		$avg_val=$avg_val+10;
		
		IF ($avg_val>100)
		{
			$avg_val=100;
		}
	
		//echo "<script language=javascript> alert('$avg_val');</script>"; echo "<script language=javascript> alert('$avg');</script>"; 
		//echo "1st : ".$avg_val."<br/>";
		$ud_count=mysql_query("SELECT Per,UniqID FROM uniqidwise_diff_per WHERE UniqId IN ($newString2) AND per BETWEEN '$avg' AND '$avg_val'");
		
		$ud_rw = mysql_num_rows($ud_count);
		$total_no_que=$ud_rw;
		echo "<br/>2nd : ".$ud_rw."<br/>";
		$message="No Questions are available with difficulty level greater than your average performance.";
		$message1="Only $ud_rw question are available with difficulty level greater than your average performance.";
		if($ud_rw >= $req_que)
		{
			echo "if 1:"; 
			while($df_row=mysql_fetch_array($ud_count))
			{
				//echo "sanjy";
				$total_que_str=$total_que_str.$df_row[1].",";
			}
			$total_que_str=substr($total_que_str, 0, -1);
			//echo $total_que_str;
			//echo "<br/>".$total_que_str;
			
			$lst = explode(",", $total_que_str);
			$i=1;
			$k=0;
			$new_val=0;
			$avg_val=0;
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
						echo "<td><input type='radio' name ='name_que' id='$lst[$ran]-$i' class='chk' value='$lst[$ran]' />$i</td>";
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
						echo "<td><input type='radio' name ='name_que' id='$lst[$ran]-$i' class='chk' value='$lst[$ran]' />$i</td>";
						
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
		}
		else
		{
			echo "else 1";
			//echo "<script language=javascript> alert('$message');</script>"; 
			if($avg_val == 100)
			{
				//echo "<script language=javascript> alert('$message');</script>"; 
				/*$ud_count=mysql_query("SELECT Per,UniqID FROM uniqidwise_diff_per WHERE UniqId IN ($newString2)");
				$ud_rw = mysql_num_rows($ud_count);
				$total_no_que=$ud_rw;*/
				if ($ud_rw=="")
				{
					$ud_rw=0;
				}
				if($ud_rw == 0)
				{
					echo "<script language=javascript> alert('$message');</script>"; 
					echo '<SCRIPT LANGUAGE="JavaScript">
					document.location.href="http://globaleduserver.com/edu/edutech_viewer3/test_paper_generator.php" </SCRIPT>';
				}
				else
				{
					//echo "<script language=javascript> alert('$cp_value12');</script>"; echo "<script language=javascript> alert('$avg');</script>"; 
					echo "<script language=javascript> alert('$message1');</script>"; 
					echo '<SCRIPT LANGUAGE="JavaScript">
					document.location.href="http://globaleduserver.com/edu/edutech_viewer3/test_paper_generator.php" </SCRIPT>';
				}
			}
			else
			{
				goto ab;
			}
		}
		include_once '../conn_close.php';
?>