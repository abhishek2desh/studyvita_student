<?php

	include_once '../config.php';
	$ulist=',3635,3636,';
	$ulist1=',3635,3636,3637';
	$ulist_final=$ulist.$ulist1;
	$final_list="";
	$final_colon="";
	$ulist_final_temp="";
	$user_count=0;
	$lst = explode(",", $ulist_final);
	foreach($lst as $item) 
	{
		if($item=="")
		{
		}
		else
		{
			if($ulist_final_temp=="")
			{
			$ulist_final_temp=",".$item.",";
			$final_colon="'".$item."'";
			$user_count=$user_count+1;
			}
			else
			{
			$temp_id=",".$item.",";	
			if (strpos($ulist_final_temp,$temp_id) !== false)
					 {
						//goto nextrec;
						
					 }
					 else
					 {
					 $ulist_final_temp=$ulist_final_temp.$item.",";
					 $final_colon=$final_colon.",'".$item."'";
					 $user_count=$user_count+1;
					 }
			}
		}
	}
	//echo $ulist_final_temp."<br/>";
	//echo $final_colon."<br/>";
	//echo $user_count."<br/>";
	/*$result = mysql_query("SELECT c.id,ROUND(IFNULL((100-sum(cs.Avg_Percent)/$user_count),0),2) AS response FROM chapterwise_student_average cs,chapter c WHERE student_id in($final_colon) AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='16')
		AND c.id=cs.Chapter_id  ");
		echo "SELECT c.id,ROUND(IFNULL((100-sum(cs.Avg_Percent)/$user_count),0),2) AS response FROM chapterwise_student_average cs,chapter c WHERE student_id in($final_colon) AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='16')
		AND c.id=cs.Chapter_id GROUP BY cs.chapter_id  ";*/
		
		$rs2 = mysql_query("SELECT distinct unit_id FROM studenttestwise_unitper  WHERE user_id in($final_colon)   AND subject_id='15' ");
		//echo "SELECT distinct s.unit_id FROM studenttestwise_unitper  WHERE user_id in($final_colon)   AND subject_id='15' ";
			$array = array();
			$num_rows = mysql_num_rows($rs2);
	echo "[";
			$i=0;
			$lst1 = explode(",", $ulist_final_temp);
			while($row2 = mysql_fetch_array($rs2))
			{
			//echo "in while";
			$Cumulative_per_total=0;
			$Cumulative_per_count=0;
			$Cumulative_per=0;
				foreach($lst1 as $item1) 
			{
				if($item1=="")
				{
				}
				else
				{
		
					$rs1 = mysql_query("SELECT s.Cumulative_per,s.id FROM studenttestwise_unitper s,unit u WHERE s.user_id='$item1' AND s.subject_id='15' AND s.unit_id=u.id AND s.unit_id='$row2[0]' and s.id IN( SELECT MAX(id) FROM studenttestwise_unitper WHERE user_id='$item1' AND subject_id='15' and unit_id='$row2[0]' )");
					while($row1 = mysql_fetch_array($rs1))
					{
					$Cumulative_per_total=$Cumulative_per_total+$row1[0];
					$Cumulative_per_count=$Cumulative_per_count+1;
					}
				}
			}
			$Cumulative_per=$Cumulative_per_total/$Cumulative_per_count;
			$i++;
		
		/*if($i<$num_rows){
			echo $row2[0]."-".$Cumulative_per.",<br/>";
		}
		else {
			cho $row2[0]."-".$Cumulative_per."<br/>";
		}*/
		if($i<$num_rows){
			echo $link = round($Cumulative_per,2).",";
		}
		else {
			echo $link = round($Cumulative_per,2);
		}
			}
		echo "]";
			
?>