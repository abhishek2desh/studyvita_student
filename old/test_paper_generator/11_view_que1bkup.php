<?php
	
		include_once '../config.php';
		$s5=$_POST['uid'];
		$req_que=$_POST['req_que'];
		$uniq_id_get=$_POST['uniq_id_get'];
		$marks_for_review=$_POST['marks_for_review'];
		$marks_for_atm=$_POST['marks_for_atm'];
		$total_no_que=$_POST['total_no_que'];
		$total_avg=$_POST['total_no_que'];
		$cp_value12=$_POST['cp_value12'];
		$sub_id=$_POST['sub_id'];
		$select_que_str="";
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		
		$total_que_str=$_POST['total_que_str'];
		
		$newString = str_replace(",","','",$total_que_str);
		$newString =  "'".$newString;
		$newString2=substr($newString, 0, -2);
		
		
		$avg=0;
		$avg_val=0;
		$ud_rw=0;
		$dj=1;
		//$ct="SELECT Avg_percent FROM chapterwise_student_average WHERE chapter_id='$cp_value12' AND student_id='$s5'";
		$avg_count=mysql_query("SELECT Avg_percent,Attempted FROM chapterwise_student_average WHERE chapter_id='$cp_value12' AND student_id='$s5'");
		$avg_count_rw = mysql_num_rows($avg_count);
		$avg_count_row=mysql_fetch_array($avg_count);
		$avg=$avg_count_row[0];
		$atmt=$avg_count_row[1];
		
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
		
		IF ($avg_val > 100)
		{
			$avg_val=100;
			
		}
		else
		{
			if($avg > 100)
			{
				a:
				$avg_val=100-$ag;
				$ud_count=mysql_query("SELECT Per,UniqID FROM uniqidwise_diff_per WHERE UniqId IN ($newString2) AND per BETWEEN '$avg_val' AND '$avg'");
			}
			else
			{
				$ud_count=mysql_query("SELECT Per,UniqID FROM uniqidwise_diff_per WHERE UniqId IN ($newString2) AND per BETWEEN '$avg' AND '$avg_val'");
			}
		}
		//echo "<script language=javascript> alert('$avg_val');</script>"; echo "<script language=javascript> alert('$avg');</script>"; 
		//echo "1st : ".$avg_val."<br/>";
		
		$ud_rw = mysql_num_rows($ud_count);
		$total_no_que=$ud_rw;
		//echo "2nd : ".$ud_rw."<br/>";
		$message3="gaya : ";
		$message2="You have secured 100% already. Enough no. of questions above you difficulty level are not available select randomly ?";
		$message="No Questions are available with difficulty level greater than your average performance.";
		$message1="Only $ud_rw question are available with difficulty level greater than your average performance.";
		if($ud_rw >= $req_que)
		{
			//echo "<script language=javascript> alert('$message');</script>"; 
			while($df_row=mysql_fetch_array($ud_count))
			{
				$total_que_str=$total_que_str.$df_row[1].",";
			}
			$total_que_str=substr($total_que_str, 0, -1);
			
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
			if($avg == 100)
			{
				$ct=round((ceil($atmt * 100)/$total_avg),2);
				if($ct >= 75)
				{
					if($dj == 1)
					{
						?>
						<script language='javascript'>
							var r=confirm("You have secured 100% already. Enough no. of questions above your difficulty level are not available. Select randomly ?");
							if (r==true)
							{
								//alert("YES");
							}
							else 
							{
								//alert("NO");
								$("#view_que_sel").empty();
								//$("#start_test").hide();
								location.reload();
							}
						</script>
						<?php
						$dj++;
					}
					 //echo "<script language=javascript> alert('$message2'+'$ct'+'$avg_val');</script>"; 
				}
				else
				{
					
					//echo "<script language=javascript> alert('$message3'+'$ct'+'$ag'+'$avg_val');</script>"; 
				}
				$ag=$ag+10;
				goto a;
			}
			else
			{
				if($avg_val == 100)
				{
					
					if ($ud_rw=="")
					{
						$ud_rw=0;
					}
					if($ud_rw == 0)
					{
						echo "<script language=javascript> alert('$message');</script>"; 
						//echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="http://globaleduserver.com/edu/testing/edutech_viewer/test_paper_generator.php" </SCRIPT>';
					}
					else
					{
						//echo "<script language=javascript> alert('$cp_value12');</script>"; echo "<script language=javascript> alert('$avg');</script>"; 
						echo "<script language=javascript> alert('$message1');</script>"; 
						//echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="http://globaleduserver.com/edu/testing/edutech_viewer/test_paper_generator.php" </SCRIPT>';
					}
				}
				else
				{
					goto ab;
				}
			}
		}
		//include_once '../conn_close.php';
?>