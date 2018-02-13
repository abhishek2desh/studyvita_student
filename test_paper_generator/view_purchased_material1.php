<?php
		include '../config.php';
		
		
		$fac_id=$_GET['fac_id'];
		$sub_select=$_GET['sub_select'];
		$doc_select=$_GET['doc_select'];
		$exam_select=$_GET['exam_select'];
		$year_select=$_GET['year_select'];
		$flg=0;
		$flg1=0;
		$srno_ans=0;
		$j=1;
		$str="";
		if($sub_select==0 || $sub_select=="")
		{
			//$str="";
		}
		else
		{
			if($str=="")
			{
			$str="AND d.SUBJECT = '$sub_select'";
			
			}
			else
			{
			$str=$str." AND d.SUBJECT = '$sub_select'";
			}
		}
		if($doc_select=='0' || $doc_select=="")
		{
			
		}
		else
		{
			if($str=="")
			{
			$str="AND d.Documenttype = '$doc_select'";
			
			}
			else
			{
			$str=$str." AND d.Documenttype = '$doc_select'";
			}
		}
		if($exam_select=='0' || $exam_select=="")
		{
			
		}
		else
		{
			if($str=="")
			{
			$str="AND d.TestType = '$exam_select'";
			
			}
			else
			{
			$str=$str." AND d.TestType = '$exam_select'";
			}
		}
		if($year_select==0 || $year_select=="")
		{
			
		}
		else
		{
			if($str=="")
			{
			$str="AND d.PaperMonthYear = '$year_select'";
			
			}
			else
			{
			$str=$str." AND d.PaperMonthYear = '$year_select'";
			}
		}
		$result1=mysql_query("SELECT distinct download_material_id,DATE_FORMAT(create_date,'%d-%m-%Y') FROM 
			user_online_order_info where user_id='$fac_id' and order_complete='1' ");
			$rw1=mysql_num_rows($result1);
			if($rw1==0)
			{
			echo "No Data Available";
			}
			else
			{
			
		while($row1=mysql_fetch_array($result1))
		{
			
			$downloaddoc_id=$row1[0];
			//echo $downloaddoc_id;
			if($downloaddoc_id=="")
			{
			}
			else
			{
				$lst = explode(",", $downloaddoc_id);
				foreach($lst as $item) 
				{
					if($item=="")
					{
					}
					else
					{
					if($str=="")
					{
					$result=mysql_query("SELECT distinct d.srno,d.MaterialName,d.path,d.online_generated,d.Examtype,d.Documenttype, d.schoolid,d.PaperMonthYear,d.TestType,d.chapter_id,s.name,d.chapter,d.description,b.name,st.name FROM document_manager_subjective d,subject s,standard st,board b WHERE d.Srno='$item' and s.id=d.subject and st.id=d.standard and b.id=d.board  ");
					}
					else
					{
					$result=mysql_query("SELECT distinct d.srno,d.MaterialName,d.path,d.online_generated,d.Examtype,d.Documenttype, d.schoolid,d.PaperMonthYear,d.TestType,d.chapter_id,s.name,d.chapter,d.description,b.name,st.name FROM document_manager_subjective d,subject s,standard st,board b WHERE d.Srno='$item' and s.id=d.subject and st.id=d.standard and b.id=d.board $str ");
					}
					
				//echo "in while";
					if($flg==0)
					{
					echo "<table style='border:solid 1px;width:100%;overflow-y: scroll' cellspacing='0'  >";
					echo "<thead>";
		echo "<tr style='background-color:#3366FF;height:25px;'>
		<th style='width:2%'></th>
		<th style='width:8%' align='left'><font  color='white' >DocumentID</font></th>
			<th style='width:8%' align='left'><font  color='white' >Date</font></th>
			<th style='width:10%' align='left'><font  color='white' >Board</font></th>
			<th style='width:10%' align='left'><font  color='white' >Standard</font></th>
			<th style='width:10%' align='left'><font  color='white' >Subject</font></th>
			<th style='width:22%' align='left'><font  color='white' >Chapter</font></th>
			<th style='width:10%' align='left'><font  color='white' >DocumentType</font></th>
			<th style='width:10%' align='left'><font  color='white' >ExamType</font></th>
			<th style='width:10%' align='left'><font  color='white' >PaperMonthYear</font></th></tr>";
					$flg=1;
					}
					
		while($row=mysql_fetch_array($result))
		{
	//echo "in while";
	if($j%2 == 0)
	{
		echo "<tr id='$row[0]' style='background-color:#5E9DC8;'>";
		$j++;
	}
	else
	{
		echo "<tr id='$row[0]' style='background-color:white;'>";
		$j++;
	}
		
			//checking answer file
			$fmn_qus=$row[1]."_Qus";
			$al_test1=mysql_query("SELECT Srno,Examtype,Documenttype,MaterialName,subject,path FROM document_manager_subjective WHERE MaterialName='$fmn_qus'");
			
			$ans="n";
			$rw_test1=mysql_num_rows($al_test1);
			if($rw_test1==0)
			{
			$ans="n";
			}
			else
			{
			$ans="y";
			while($row_ans=mysql_fetch_array($al_test1))
			{
			$srno_ans=$row_ans[0];
			$srno_ans_name=$row_ans[3];
			}
			}
			//end checking
			/*$result=mysql_query("SELECT distinct d.srno,d.MaterialName,d.path,d.online_generated,d.Examtype,d.Documenttype, d.schoolid,d.PaperMonthYear,d.TestType,d.chapter FROM 			document_manager_subjective d WHERE d.Srno='$item'  ");
			$result=mysql_query("SELECT distinct d.srno,d.MaterialName,d.path,d.online_generated,d.Examtype,d.Documenttype, d.schoolid,d.PaperMonthYear,d.TestType,d.chapter_id,s.name,d.chapter,d.description FROM document_manager_subjective d,subject s WHERE d.Srno='$item' and s.id=d.subject  ");
			*/
			$flg1=1;
				echo "<td style='color:black;border:solid 0px;'><center><input type='radio' name='name_ts' id='$row[2]|$row[0]|$row[1]|$row[3]|$ans|$srno_ans|$row[4]|$row[5]|$srno_ans_name' class='ck' value='$row[0]' /></center></td>";
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$row[0]."</font></td>";
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$row1[1]."</font></td>";
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$row[13]."</font></td>";
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$row[14]."</font></td>";
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$row[10]."</font></td>";
				$chaptername="";
				if($row[9]=="")
				{
				$chaptername=$row[12];
				}
				else
				{
				$lstc = explode(",", $row[9]);
					foreach($lstc as $itemc) 
					{
						if($itemc=="")
						{
						}
						else
						{
							$rname1=mysql_query("SELECT name FROM `chapter` WHERE id='$itemc' ");
							while($row_rname1=mysql_fetch_array($rname1))
							{
							$chaptername=$chaptername.$row_rname1[0].",";
							}
						}
					}
				}
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$chaptername."</font></td>";
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$row[5]."</font></td>";
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$row[8]."</font></td>";
				echo "<td style='border-right:solid 1px;'><font  color='black' >".$row[7]."</font></td>";
				
			echo "</tr>";
			
		}
					}
				}
			}
		}
		if($flg1==0)
		{
		echo "<tr><td></td><td></td><td></td><td></td><td></td><td>No Data Available</td><td></td><td></td><td></td></tr>";
		}
		echo "</table>";
		}	
		
			
		
		
		
		
		//include '../conn_close.php';
?>