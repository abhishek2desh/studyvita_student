<?php
	
		include_once '../config.php';
		
	$user_id = $_GET['user_id'];
	$flg=0;
		echo "<table style='border:solid 1px;width:99.9%;height:20px;' id='t02'>
									<tr>
										<th style='width:8%;border:solid 1px;'><blink>Test-ID</blink></th>
										<th style='width:10%;border:solid 1px;'>Prepared By</th>
										<th style='width:5%;border:solid 1px;'></th>
										<th style='width:5%;border:solid 1px;'>Standard</th>
										<th style='width:5%;border:solid 1px;'>Board</th>
										<th style='width:10%;border:solid 1px;'>Subject</th>
										<th style='width:18%;border:solid 1px;'>Chapter & Desctiption</th>
										<th style='width:25%;border:solid 1px;'>Active Period</th>
										<th style='width:7%;border:solid 1px;'>Duration</th>
										<th style='width:5;border:solid 1px;'>Status</th>
									</tr>";
									$currentDate = strtotime(date("Y-m-d H:i:s"));
$uid=$user_id;
	$resultf=mysql_query("SELECT date_formula from server_date_formula where active='1'");
	$formula=0;
	while($rowf=mysql_fetch_array($resultf))
	{
	$formula=$rowf[0];
	}
	$futureDate = $currentDate+($formula);
	//$futureDate = $currentDate+(60*570.100002);
	//$futureDate = $currentDate+(37810);
		//$futureDate = $currentDate+(34210);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	
	
	$result=mysql_query("SELECT DISTINCT q.name,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date,
	DATE_FORMAT(from_date,'%d-%m-%Y  %H-%i-%s'),DATE_FORMAT(to_date,'%d-%m-%Y  %H-%i-%s'),duration,IF('$formatDate' < from_date , 'coming_soon', 
	 IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date,sub.name,ta.description,blueprint_id,ta.faculty_id,ta.que_paper_id,ta.chap_id
	FROM test_announce ta,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id
	AND competition_test='1' AND ta.OnlineTest = '1' and ta.sub_id<>'20' and ta.exam_type='31' ORDER BY ta.test_date DESC");
	
	
$blueprint_id=0;
	while($row=mysql_fetch_array($result))
	{
	//for checking uinqid exist or not 
	$blueprint_id=$row[12];
	if($blueprint_id==0)
	{
	$result_chk=mysql_query("SELECT DISTINCT uniqid FROM onlineuniqid WHERE testid='$row[0]' ");
	$row_chk=mysql_num_rows($result_chk);
	if($row_chk==0)
	{
	goto nextrec;
	}
	
	}
	//end checking
		echo "<tr id='$row[14]'>";
			$flg=1;
			//disabled="disabled"
			$SQL_1 = "SELECT Test_Submit FROM adaptive_learning_test WHERE test_id='$row[0]' AND student_id='$uid'";
			$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
			$row_1=mysql_fetch_row($result_1);
			$fact_name="";
			$fact_id=0;
			$image_path="";
			$board_name="";
			$std_name="";
			$resultb=mysql_query("SELECT b.name,s.name from test_announce t,batch bt,board b,standard s where t.que_paper_id='$row[14]' and bt.id=t.batch_id and b.id=bt.board_id and s.id=bt.standard_id ");
			while($rowb=mysql_fetch_array($resultb))
			{
			$board_name=$rowb[0];
			$std_name=$rowb[1];
			}
			if (is_numeric($row[13])) 
			{
				$resulti=mysql_query("SELECT name,student_photos from user where id='$row[13]'");
	
				while($rowi=mysql_fetch_array($resulti))
				{
				$fact_name=$rowi[0];
				$image_path=$rowi[1];
				}
			}
			else
			{
			$fact_name=$row[13];
			}
			if($row_1[0] == 1)
			{
				echo "<td style='border:solid 1px;'>".$row[0]."</td></center>
				<td  style='border:solid 1px;'>".$fact_name."</td>";
				if($image_path=="")
				{
				echo "<td style='border:solid 1px;'></td>";
				}
				else
				{
				echo "<td style='border:solid 1px;'><img src='../StudentPhotos/$image_path' style='width:3em;max-height:3em'></td>";
				}
				echo "<td style='border:solid 1px;'>".$std_name."</td>";
				echo "<td style='border:solid 1px;'>".$board_name."</td>";
				echo "<td  style='border:solid 1px;'>".$row[10]."</td>";
				
				echo"<td style='border:solid 1px;'>".$row[15]." ".$row[11]."</td>
				<td style='border:solid 1px;'>".$row[2]." To ".$row[3]."</td>
				<td style='border:solid 1px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
			}
			else
			{
				if($row[5] == 'coming_soon')
				{
					echo "<td style='border:solid 1px;'>".$row[0]."</td></center>";
					echo "<td  style='border:solid 1px;'>".$fact_name."</td>";
					if($image_path=="")
				{
				echo "<td style='border:solid 1px;'></td>";
				}
				else
				{
				echo "<td style='border:solid 1px;'><img src='../StudentPhotos/$image_path' style='width:3em;max-height:3em'></td>";
				}
				echo "<td style='border:solid 1px;'>".$std_name."</td>";
				echo "<td style='border:solid 1px;'>".$board_name."</td>";
				echo "<td  style='border:solid 1px;'>".$row[10]."</td>";
					echo "<td style='border:solid 1px;'>".$row[15]." ".$row[11]."</td>
					<td style='border:solid 1px;'>".$row[2]." To ".$row[3]."</td>
					<td style='border:solid 1px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
				}
				else if($row[5] == 'expire')
				{
					echo "<td style='border:solid 1px;'>".$row[0]."</td></center>";
					echo "<td  style='border:solid 1px;'>".$fact_name."</td>";
						if($image_path=="")
				{
				echo "<td style='border:solid 1px;'></td>";
				}
				else
				{
				echo "<td style='border:solid 1px;'><img src='../StudentPhotos/$image_path' style='width:3em;max-height:3em'></td>";
				}
				echo "<td style='border:solid 1px;'>".$std_name."</td>";
				echo "<td style='border:solid 1px;'>".$board_name."</td>";
				echo "<td  style='border:solid 1px;'>".$row[10]."</td>";
					echo "<td style='border:solid 1px;'>".$row[15]." ".$row[11]."</td>
					<td style='border:solid 1px;'>".$row[2]." To ".$row[3]."</td>
					<td style='border:solid 1px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
				}
				else
				{
					echo "<td style='border:solid 1px;'>".$row[0]."</td></center>";
					echo "<td  style='border:solid 1px;'>".$fact_name."</td>";
						if($image_path=="")
				{
				echo "<td style='border:solid 1px;'></td>";
				}
				else
				{
				echo "<td style='border:solid 1px;'><img src='../StudentPhotos/$image_path' style='width:3em;max-height:3em'></td>";
				}
				echo "<td style='border:solid 1px;'>".$std_name."</td>";
				echo "<td style='border:solid 1px;'>".$board_name."</td>";
				echo "<td  style='border:solid 1px;'>".$row[10]."</td>";
					echo "<td style='border:solid 1px;'>".$row[15]." ".$row[11]."</td>
					<td style='border:solid 1px;'>".$row[2]." To ".$row[3]."</td>
					<td style='border:solid 1px;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
				}
			}
			if($row[5] == 'coming_soon')
			{
				echo "<td id='expire_id' value='coming_soon' style='border:solid 1px;'><div style='color:green;font-size:14px;'><blink>Coming Soon</link></div></td>";
			}
			else if($row[5] == 'expire')
			{
				echo "<td id='expire_id' value='expire' style='border:solid 1px;'><div style='color:red;font-size:14px;'>Expired
				</td>";
				//echo "<td id='expire_id' value='expire' style='width:15%;color:black;border-bottom:2px solid #005000;'><div style='color:red;font-size:14px;'>Expired<input type='button' class='defaultbutton' id='view_result1' value='Result' /></td>";
			}
			else
			{
				$SQL_1 = "SELECT Test_Submit FROM adaptive_learning_test WHERE test_id='$row[0]' AND student_id='$uid'";
				$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
				$row_1=mysql_fetch_row($result_1);
				if($row_1[0] == 1)
				{
					echo "<td id='expire_id' value='active' style='border:solid 1px;'><div style='color:Green;font-size:14px;'>Completed</div></td>";
				}
				else
				{
					echo "<td id='expire_id' value='active' style='border:solid 1px;'><div style='color:Green;font-size:14px;'>Active</div>";
					$rs_check = mysql_query("SELECT que_paper_id from test_announce where user_id='$user_id' and que_paper_id='$row[14]'");
					$rw_check = mysql_num_rows($rs_check);
	
						
		if($rw_check == 0)
		{
		echo "<input type='button' class='defaultbutton' id='registerid' value='Register' />";
		}
		else
		{
		echo "Registered";
		}
					echo "</td>";
				}
			}
			echo "<td id='rowid8' value ='$row[8]'  style='visibility: hidden;color:black;border-bottom:2px solid #005000;'></td>";
			echo "<td id='rowid9' value ='$row[9]'  style='visibility: hidden;color:black;border-bottom:2px solid #005000;'></td>";
			//echo "<td id='expire_id1' value ='$row[5]'  style='color:black;border-bottom:2px solid #005000;'></td>";
		echo "</tr>";
		nextrec:
	}
	if($flg==0)
	{
		echo "</tr>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'>No Data Available</td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "</tr>";
	}
	echo "</table>";
?>