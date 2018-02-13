<?php
	
		include_once '../config.php';
		$total_que_str=$_GET['total_que_str'];
		$diff_per=$_GET['diff_per'];
		$select_concept_wise=$_GET['select_concept_wise'];
		$req_que=$_GET['req_que'];
		$total_que_str=substr($total_que_str, 0, -1);
		$uniq_id_get=$_GET['uniq_id_get'];
		$total_no_que=$_GET['total_no_que'];
		$marks_for_review=$_GET['marks_for_review'];
		$marks_for_atm=$_GET['marks_for_atm'];
		$select_que_str="";
		$i=1;
		$k=0;
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		$lst = explode(",", $total_que_str);
		$new_val=0;
		echo "<table>";
		if($select_concept_wise == 1)
		{
			foreach($lst as $item) 
			{
				if($get_val == $req_que)
				{
					//echo '<script type="text/javascript">$(function(){ $("#cpt").empty(); })</script>';
					goto out1;
				}
				$rep_check=mysql_query("SELECT UniqId FROM uniqidwise_diff_percentage WHERE Percentage > '$diff_per'  AND UniqId='$item'");
				
				$rp1 = mysql_num_rows($rep_check);
				if($rp1 == 1)
				{
					if($new_val == 4)
					{
						$new_val=0;
						$new_val++;
						echo "</tr>";
						echo "<tr>";
						echo "<td><input type='checkbox' name ='$i' id='$item' class='chk' value='$item' />$i</td>";
						$item1=",".$item.",";
						if(strpos($coma1,$item1) !== false)
						{
							$get_val++;
							echo "<td><div style='background-color:green;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						else if(strpos($coma,$item1) !== false)
						{
							$get_val++;
							echo "<td><div style='background-color:yellow;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						else
						{
							$get_val++;
							echo "<td><div style='background-color:red;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
					}
					else
					{
						$new_val++;
						echo "<td><input type='checkbox' name ='$i' id='$item' class='chk' value='$item' />$i</td>";
						$item1=",".$item.",";
						if(strpos($coma1,$item1) !== false)
						{
							$get_val++;
							echo "<td><div style='background-color:green;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						else if(strpos($coma,$item1) !== false)
						{
							$get_val++;
							echo "<td><div style='background-color:yellow;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						else
						{
							$get_val++;
							echo "<td><div style='background-color:red;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
					}
					$i++;
				}
			}
			out1:
			if($get_val < $req_que)
			{
				echo '<script type="text/javascript">alert("Insufficient Data");</script>';
				echo '<script type="text/javascript">$(function(){ $("#view_que_sel").empty(); })</script>';
				echo '<script type="text/javascript">$(function(){ $("#start").show(); })</script>';
				echo '<script type="text/javascript">$(function(){ $("#start_test").hide(); })</script>';
			}
			else
			{
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
			}
		}
		else
		{
			foreach($lst as $item) 
			{
				if($get_val == $req_que)
				{
					//echo '<script type="text/javascript">$(function(){ $("#cpt").empty(); })</script>';
					goto out;
					
				}
				
				$rep_check=mysql_query("SELECT UniqId FROM uniqidwise_diff_percentage WHERE Percentage < '$diff_per'  AND UniqId='$item'");
				$rp1 = mysql_num_rows($rep_check);
				if($rp1 == 1)
				{
					if($new_val == 4)
					{
						$new_val=0;
						$new_val++;
						echo "</tr>";
						echo "<tr>";
						echo "<td><input type='checkbox' name ='$i' id='$item' class='chk' value='$item' />$i</td>";
						$item1=",".$item.",";
						if(strpos($coma1,$item1) !== false)
						{
							$get_val++;
							echo "<td><div style='background-color:green;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						else if(strpos($coma,$item1) !== false)
						{
							$get_val++;
							echo "<td><div style='background-color:yellow;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						else
						{
							$get_val++;
							echo "<td><div style='background-color:red;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						
					}
					else
					{
						$new_val++;
						echo "<td><input type='checkbox' name ='$i' id='$item' class='chk' value='$item' />$i</td>";
						$item1=",".$item.",";
						if(strpos($coma1,$item1) !== false)
						{
							$get_val++;
							echo "<td><div style='background-color:green;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						else if(strpos($coma,$item1) !== false)
						{
							$get_val++;
							echo "<td><div style='background-color:yellow;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
						else
						{
							$get_val++;
							echo "<td><div style='background-color:red;border:solid 0px;width:30px;height:10px;'></div></td>";
						}
					}
					
					$i++;
				}
			}
			out:
			if($get_val < $req_que)
			{
				echo '<td><script type="text/javascript">alert("Insufficient Data");</script></td>';
				echo '<script type="text/javascript">$(function(){ $("#view_que_sel").empty(); })</script>';
				echo '<script type="text/javascript">$(function(){ $("#start").show(); })</script>';
				echo '<script type="text/javascript">$(function(){ $("#start_test").hide(); })</script>';
			}
			else
			{
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
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>