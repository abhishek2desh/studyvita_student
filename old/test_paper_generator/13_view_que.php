<?php
	
		include_once '../config.php';
		$total_que_str=$_GET['total_que_str'];
		$diff_per=$_GET['diff_per'];
		$select_concept_wise=$_GET['select_concept_wise'];
		$req_que=$_GET['req_que'];
		$total_que_str=substr($total_que_str, 0, -1);
		$uniq_id_get=$_GET['uniq_id_get'];
		//$total_no_que=$_GET['total_no_que']='12';
		$marks_for_review=$_GET['marks_for_review'];
		$marks_for_atm=$_GET['marks_for_atm'];
		$select_que_str="";
		$i=1;
		$k=0;
		$con_str="";
		$str34="";
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		
		$lst1 = explode(",", $total_que_str);
		$rep_check_34="";
		foreach($lst1 as $item) 
		{
			$str34=$str34."'".$item."',";
		}
		$str35=substr($str34, 0, -1);
		//echo $str35;
		$new_val=0;
		$total_no_que=0;
		echo "<table>";
		if($select_concept_wise == 1)
		{
				//echo "In if";
				$result=mysql_query("SELECT UniqId FROM uniqidwise_diff_per WHERE Per > '$diff_per' 
							AND UniqId IN($str35)");
							
				while($row=mysql_fetch_array($result))
				{
					$con_str=$con_str.$row[0].",";
					$total_no_que++;
				}
				
				$con_str1=substr($con_str, 0, -1);
				//echo $con_str1;
				$lst = explode(",", $con_str1);
				if($total_no_que < $req_que)
				{
					echo '<script type="text/javascript">alert("Insufficient Data");</script>';
					echo '<script type="text/javascript">$(function(){ $("#view_que_sel").empty(); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#start").show(); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#start_test").hide(); })</script>';
				}
				else
				{
						//echo "In else ";
					echo '<script type="text/javascript">$(function(){ $("#cpt *").attr("disabled", "disabled").off("click"); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#start").hide(); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#start_test").show(); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#std").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#required_que").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("input[type=radio][class=class_radio_up]").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#sel_time").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#sb").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#sel_type").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#df_wise").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("input[type=radio][name=choice_type]").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("input[type=radio][name=test_type]").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("input[type=radio][name=board]").attr("disabled",true); })</script>';
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
				}
		}
		else
		{
				//echo "In if";
				$result=mysql_query("SELECT UniqId FROM uniqidwise_diff_per WHERE Per < '$diff_per' 
							AND UniqId IN($str35)");
							
				while($row=mysql_fetch_array($result))
				{
					$con_str=$con_str.$row[0].",";
					$total_no_que++;
				}
				
				$con_str1=substr($con_str, 0, -1);
				//echo $con_str1;
				$lst = explode(",", $con_str1);
				if($total_no_que < $req_que)
				{
					echo '<script type="text/javascript">alert("Insufficient Data");</script>';
					echo '<script type="text/javascript">$(function(){ $("#view_que_sel").empty(); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#start").show(); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#start_test").hide(); })</script>';
				}
				else
				{
						//echo "In else ";
					echo '<script type="text/javascript">$(function(){ $("#cpt *").attr("disabled", "disabled").off("click"); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#start").hide(); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#start_test").show(); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#std").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#required_que").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("input[type=radio][class=class_radio_up]").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#sel_time").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#sb").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#sel_type").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("#df_wise").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("input[type=radio][name=choice_type]").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("input[type=radio][name=test_type]").attr("disabled",true); })</script>';
					echo '<script type="text/javascript">$(function(){ $("input[type=radio][name=board]").attr("disabled",true); })</script>';
					for ($j=0;$j<=$total_no_que;$j++)
					{
					if ($j==$req_que)
					{
						goto out;
					}
					in2:
						$ran="";
						$ran=rand(1,$total_no_que);
						$ran=$ran-1;
						$run2="";
						$run1="";
						$run2=",".$lst[$ran].",";
						$run1=",".$select_que_str;
					
						if(strpos($run1,$run2) !== false)
						{
								goto in2;
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
				}
		}
		out:
		echo "</table>";
		echo "<table>";
			echo "<tr>";
				echo "<td id='sel_que_diff' value='$select_que_str'></td>";
				echo "<td id='sel_que_ran_diff' value='$select_ran'></td>";
			echo "</tr>";
		echo "</table>";
		include_once '../conn_close.php';
?>