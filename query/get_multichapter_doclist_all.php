<?php
	include '../config.php';
	$subject_id=$_GET['sub_id'];
	$course_id=$_GET['course_id'];
	$material_type=$_GET['material_type'];
	$uid=$_GET['uid'];
	$examtype=$_GET['examtype'];
	$batch_id=$_GET['batch_id'];
	$querystring="";
	$st_id_check="";
	$noaccess="";
	$st_id_check=",".$uid.",";
	$j=1;
	if($examtype=="")
	{
	if($material_type=="notes" )
	{
	$querystring=" AND (Documenttype='notes' or Documenttype='LectureNotes')";
	}
	else
	{
	$querystring=" AND Documenttype='$material_type'";
	}
	
	}
	else
	{
		if($material_type=="notes" )
		{
		$querystring=" AND (Documenttype='notes' or Documenttype='LectureNotes') and examtype like '%$examtype%'";
		}
		else
		{
		$querystring=" AND Documenttype='$material_type' and examtype like '%$examtype%'";
		}
	
	}
	if($material_type=="ppt" || $material_type=="notes" ||  $material_type=="topperanswersheet" || $material_type=="Weblink" )
	{
		
		$result=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id,dms.PaperMonthYear,dms.magazine_id  FROM course_batch_material cb,document_manager_subjective dms
		WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' 	$querystring order by srno DESC");
		
		
		$mttype_sort="";
		$total=0;
		if($material_type=="ppt")
		{
		$mttype_sort="ppt";
		}
		else if($material_type=="notes")
		{
		$mttype_sort="not";
		}
		elseif($material_type=="topperanswersheet")
		{
		$mttype_sort="top";
		}
		elseif($material_type=="Weblink")
		{
		$mttype_sort="web";
		}
		$rw = mysql_num_rows($result);
		if($rw == 0) 
		{
		
		}
		else
		{
			$rc=0;
			while($row=mysql_fetch_array($result))
			{
			$chapter="";
		
							//for chapter
							if($row[7]=="")
			{
					if($row[4]=="")
					{
					}
					else
					{
						$chapter=$row[3]."[".$row[4]."]";
					}
			}
			else
			{
					 if (strpos($row[7],",") !== false)
					 {
						 $chapter="";
						 $lst=explode(",",$row[7]);
						foreach($lst as $item)
						{
						if($item=="")
						{
						}
						else
						{
							$result_chap=mysql_query("SELECT name FROM `chapter` where id='$item'");
							while($row_chap=mysql_fetch_array($result_chap))
							{
							$chapter=$chapter.$row_chap[0].",";
							}
						}
						}
					 }
					 else
					 {
						 $result_chap=mysql_query("SELECT name FROM `chapter` where id='$row[7]'");
						while($row_chap=mysql_fetch_array($result_chap))
						{
						$chapter=$row_chap[0];
						}
					 }
				
					if($row[4]=="")
					{
					}
					else
					{
						if($chapter==$row[4])
						{
						
						}
						else
						{
						
						$chapter=$chapter."[".$row[4]."]";
						}
					}
					
			}
			
							/*if($row[4]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[7];
						
							if($chapter_list=="")
							{
							$chpater="";
							
							}
							else
							{
							
						
							
							 if (strpos($chapter_list,",") !== false)
				 {
				 $chapter="";
				 $lst=explode(",",$chapter_list);
				foreach($lst as $item)
				{
				if($item=="")
				{
				}
				else
				{
					$result_chap=mysql_query("SELECT name FROM `chapter` where id='$item'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$chapter=$chapter.$row_chap[0].",";
					}
				}
				}
				
				 }
				 else
				 {
				 $chapter="";
				 $result_chap=mysql_query("SELECT name FROM `chapter` where id='$chapter_list'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$chapter=$chapter.$row_chap[0].",";
					}
					
				 }
							}
							}
							else
							{
							$chapter=$row[3];
							
							}
								
							}
							else
							{
								$chapter=$row[4];
								
							}*/
							//end chapter
			//$chapter=$row[3]." ".$row[4];
			/*if($row[3]=="")
			{
			$chapter=$row[4];
			}
			else
			{
			$chapter=$row[3];
			}*/
				$path1=$row[2];
				if($path1=="")
				{
				}
				else
				{
					
					if($material_type=="Weblink" )
					{
					if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll;overflow-y:auto' cellspacing='3'>";
			echo "<tr style='height:40px;'>
			<td style='width:3%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Ref.ID</font></b></td>
			<td style='width:57%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Chapter</font></b></td>
			<td style='width:20%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Number of access</font></b></td>";
			echo"</tr>";
			$total=1;
						}
						if($row[5]=='1')
												{
													$stulist=$row[6];
												//echo "stid-".$stulist;
													if (strpos($stulist,$st_id_check)   )
													{
														
													}
													else
													{
													if($stulist==$st_id_check)
													{
													
													}
													else
													{
												
													goto labelweblink;
													}
													
													
													}

												}
							if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
							if($material_type=="Magazinelink")
							{
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]|mzlink' class='ck' value='$row[0]' /></center></td>";
							}
							else
							{
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]|weblink' class='ck' value='$row[0]' /></center></td>";
							}
							
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							/*if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							}*/
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND document_id='$row[0]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";
							echo "</tr>";
							$rc=1;
					goto labelweblink;
					}
						
						$chk=substr($row[2], 0, 1);	
						$dir1 = substr($row[2],2);
						$dir1 = substr($dir1,0, -4);
						
						if($material_type=="ppt")
						{
						$ext = ".ppt";
						}
						else
						{
						$ext = ".pdf";
						}
							
							//$new_path = "D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\ppt\\$row[1]".$ext;
						
							//$ext = ".pdf";
							$dir2 = $dir1.$ext;
							if($chk == "S")	{	$dt = "Edutech Materials";	}
							else if($chk == "U")	{	$dt = "EdutechData";	}
							else if($chk == "V")	{	$dt = "paresh";	}
							else if($chk == "R")	{	$dt = "Tempquestions";	}
							$server = "\\\ALNITEC-73N4CS8\\";
							$new_path = $server."$dt".$dir2;
							//echo $new_path ;
						
						if(file_exists($new_path))
						{
						if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll;overflow-y:auto' cellspacing='3'>";
			echo "<tr style='height:40px;'>
			<td style='width:3%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Ref.ID</font></b></td>
			<td style='width:57%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Chapter</font></b></td>
			<td style='width:20%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Number of access</font></b></td>";
			echo"</tr>";
			$total=1;
						}
						if($row[5]=='1')
												{
													$stulist=$row[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelweblink;
													
													}

												}
								if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							/*if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							}*/
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND document_id='$row[0]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";
							echo "</tr>";
							$rc=1;
						}
						else
						{
							if($material_type=="ppt")
							{
							$new_path = "D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\ppt\\$row[1]".$ext;
							if(file_exists($new_path))
							{
							if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll;overflow-y:auto' cellspacing='3'>";
			echo "<tr style='height:40px;'>
			<td style='width:3%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Ref.ID</font></b></td>
			<td style='width:57%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Chapter</font></b></td>
			<td style='width:20%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Number of access</font></b></td>";
			echo"</tr>";
			$total=1;
						}
						if($row[5]=='1')
												{
													$stulist=$row[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelweblink;
													
													}

												}
										if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
								
								echo "<td style='color:black;border:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$new_path|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
								
								
								echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
								echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
								/*if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

								echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							}*/	
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND document_id='$row[0]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";
								echo "</tr>";
								$rc=1;
							}
							}
						}
					
				}
				labelweblink:
			}
		}
		if($rc==0)
		{
		if($total==1)
		{
		echo "<tr><td>
		</td><td>
		</td><td>No Data Available</td><td></td></tr>";
		}
		else
		{
		echo "No Data Available";
		}
		}
	}
	else if($material_type=="Magazinelink")
	{
	$result=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id,dms.PaperMonthYear,dms.magazine_id  FROM course_batch_material cb,document_manager_subjective dms
		WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' 	$querystring order by srno DESC");
		$total=0;
		$rw = mysql_num_rows($result);
		if($rw == 0) 
		{
		
		}
		else
		{
			$rc=0;
		while($row=mysql_fetch_array($result))
			{
			$chapter="";
		
							//for chapter
							
								/*$chapter_list="";
								$chapter_list=$row[7];
						
							if($chapter_list=="")
							{
							$chpater="";
							$chpater=$row[4];
							}
							else
							{
							
						
							
							 if (strpos($chapter_list,",") !== false)
				 {
				 $chapter="";
				 $lst=explode(",",$chapter_list);
				foreach($lst as $item)
				{
				if($item=="")
				{
				}
				else
				{
					$result_chap=mysql_query("SELECT name FROM `chapter` where id='$item'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$chapter=$chapter.$row_chap[0].",";
					}
				}
				}
				
				 }
				 else
				 {
				 $chapter="";
				 $result_chap=mysql_query("SELECT name FROM `chapter` where id='$chapter_list'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$chapter=$chapter.$row_chap[0].",";
					}
					
				 }
							}*/
							
							if($row[7]=="")
			{
					if($row[4]=="")
					{
					}
					else
					{
						$chapter=$row[3]."[".$row[4]."]";
					}
			}
			else
			{
					 if (strpos($row[7],",") !== false)
					 {
						 $chapter="";
						 $lst=explode(",",$row[7]);
						foreach($lst as $item)
						{
						if($item=="")
						{
						}
						else
						{
							$result_chap=mysql_query("SELECT name FROM `chapter` where id='$item'");
							while($row_chap=mysql_fetch_array($result_chap))
							{
							$chapter=$chapter.$row_chap[0].",";
							}
						}
						}
					 }
					 else
					 {
						 $result_chap=mysql_query("SELECT name FROM `chapter` where id='$row[7]'");
						while($row_chap=mysql_fetch_array($result_chap))
						{
						$chapter=$row_chap[0];
						}
					 }
				
					if($row[4]=="")
					{
					}
					else
					{
						if($chapter==$row[4])
						{
						
						}
						else
						{
						
						$chapter=$chapter."[".$row[4]."]";
						}
					}
					
			}
				
							
							//end chapter
			
				$path1=$row[2];
				if($path1=="")
				{
				}
				else
				{
					
					
					if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='3'>";
		echo "<tr style='height:40px;'>
							<td style='width:3%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'></td>
							<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='black' >Ref.ID</font></b></td>";
							echo "<td style='width:25%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='black' >Magazine Name</font></b></td>";
							echo "<td style='width:27%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='black' >Chapter</font></b></td>";
							
							echo "<td style='width:25%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='black' >Month Year</font></b></td>";
			echo"</tr>";
			$total=1;
						}
						if($row[5]=='1')
												{
													$stulist=$row[6];
												//echo "stid-".$stulist;
													if (strpos($stulist,$st_id_check)   )
													{
														
													}
													else
													{
													if($stulist==$st_id_check)
													{
													
													}
													else
													{
												
													goto labelmazlink;
													}
													
													
													}

												}
					if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]|mzlink' class='ck' value='$row[0]' /></center></td>";

							
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							$magazine_name="";
							$result_chap=mysql_query("SELECT name FROM `magazine_detail` where id='$row[9]'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$magazine_name=$row_chap[0];
					}
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:25%;'><font  color='black' >".$magazine_name."</font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:27%;border-right:solid 1px'><font  color='black' >".$chapter."</font></td>";
							/*if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:27%;border-right:solid 1px'><font  color='black' >".$stre."</font></td>";
							}
							else
							{
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:27%;border-right:solid 1px'><font  color='black' >".$chapter."</font></td>";
							}*/
							
							
							echo "<td style='border-right:solid 0px;border-bottom:solid 1px;width:25%;'><font  color='black' >".$row[8]."</font></td>";
							echo "</tr>";
							$rc=1;
					
					
					
				labelmazlink:
			}
		}
		}
		if($rc==0)
		{
		if($total==1)
		{
		echo "<tr><td>
		</td><td>
		</td><td>No Data Available</td></td><td></td><td></tr>";
		}
		else
		{
		echo "No Data Available";
		}
		}
	}
	else if($material_type=="previouscompetitivepaper")
	{
	$result=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist,dms.chapter_id
 FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND (SUBJECT='$subject_id'  OR SUBJECT='20') AND dms.documenttype='PreviousCompetitivePaper'");
										$rw = mysql_num_rows($result);
										$rc=0;
										$total=0;
		if($rw == 0) 
		{
		
		}
		else
		{
			$rc=0;
			while($row=mysql_fetch_array($result))
			{
			$chapter="";
			$chapter="";
							//for chapter
							/*if($row[4]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[9];
						
							if($chapter_list=="")
							{
							$chpater="";
							
							}
							else
							{
							
						
							
							 if (strpos($chapter_list,",") !== false)
				 {
				 $chapter="";
				 $lst=explode(",",$chapter_list);
				foreach($lst as $item)
				{
				if($item=="")
				{
				}
				else
				{
					$result_chap=mysql_query("SELECT name FROM `chapter` where id='$item'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$chapter=$chapter.$row_chap[0].",";
					}
				}
				}
				
				 }
				 else
				 {
				 $chapter="";
				 $result_chap=mysql_query("SELECT name FROM `chapter` where id='$chapter_list'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$chapter=$chapter.$row_chap[0].",";
					}
					
				 }
							}
							}
							else
							{
							$chapter=$row[3];
							
							}
								
							}
							else
							{
								$chapter=$row[4];
								
							}*/
							if($row[9]=="")
			{
					if($row[4]=="")
					{
					}
					else
					{
						$chapter=$row[3]."[".$row[4]."]";
					}
			}
			else
			{
					 if (strpos($row[9],",") !== false)
					 {
						 $chapter="";
						 $lst=explode(",",$row[9]);
						foreach($lst as $item)
						{
						if($item=="")
						{
						}
						else
						{
							$result_chap=mysql_query("SELECT name FROM `chapter` where id='$item'");
							while($row_chap=mysql_fetch_array($result_chap))
							{
							$chapter=$chapter.$row_chap[0].",";
							}
						}
						}
					 }
					 else
					 {
						 $result_chap=mysql_query("SELECT name FROM `chapter` where id='$row[9]'");
						while($row_chap=mysql_fetch_array($result_chap))
						{
						$chapter=$row_chap[0];
						}
					 }
				
					if($row[4]=="")
					{
					}
					else
					{
						if($chapter==$row[4])
						{
						
						}
						else
						{
						
						$chapter=$chapter."[".$row[4]."]";
						}
					}
					
			}
			
							//end chapter
/*if($row[3]=="")
			{
			$chapter=$row[4];
			}
			else
			{
			$chapter=$row[3];
			}*/
				if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll;overflow-y:auto' cellspacing='3'>";
			echo "<tr style='height:40px;'>
			<td style='width:3%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Ref.ID</font></b></td>
			<td style='width:57%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Chapter</font></b></td>
			<td style='width:20%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Number of access</font></b></td>";
			echo"</tr>";
						$total=1;
						}
						if($row[7]=='1')
						{
							$stulist=$row[8];
						
							if (strpos($stulist,$st_id_check))
							{
								
							}
							else
							{
							goto labelnx7;
							
							}

						}
					if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
								
								echo "<td style='color:black;border:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
								
								
								echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
								echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
								/*if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

								echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							}*/
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND document_id='$row[0]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";							
								echo "</tr>";
								$rc=1;
				labelnx7:
			}
		}
		if($rc==0)
		{
		if($total==1)
		{
		echo "<tr><td>
		</td><td>
		</td><td>No Data Available</td><td></td></tr>";
		}
		else
		{
		echo "No Data Available";
		}
		}
	}
	else if($material_type=="video")
	{
	$rc=0;
	$total=0;
	$result_link2=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard,mm.chap_id 
		FROM course_video cv,media_manager mm WHERE cv.course_id='$course_id' AND mm.id=cv.video_id AND  mm.pathfilename is not null");
											
											
												
					while($row_link2=mysql_fetch_array($result_link2))
					{
						if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll;overflow-y:auto' cellspacing='3'>";
			echo "<tr style='height:40px;'>
			<td style='width:3%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Ref.ID</font></b></td>
			<td style='width:57%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >File Name</font></b></td>
			<td style='width:20%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Number of access</font></b></td>";
			echo"</tr>";
						$total=1;
						}
					if($row_link2[3]=="")
					{
					}
					else
					{
						if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row_link2[3]|$row_link2[2]|vod' class='ck' value='$row_link2[2]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row_link2[2]."</font></td>";
							if($row_link2[7]=="")
							{
								echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$row_link2[0]."</font></td>";
							}
							else
							{
							$chapter="";
							$result_chap=mysql_query("SELECT name FROM `chapter` where id='$row_link2[7]'");
						while($row_chap=mysql_fetch_array($result_chap))
						{
						$chapter=$row_chap[0];
						}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."[".$row_link2[0]."]</font></td>";
							}
							/*if(strlen($row_link2[0])>20)
							{
							$stre=substr($row_link2[0],0,19);
							
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$row_link2[0]."</font></td>";
							}*/
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND video_id='$row_link2[2]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";
							echo "</tr>";
							$rc=1;
					}
					
					}
					//for chapter mapping
					$result_link256=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard,mm.chap_id FROM course_video cv,media_manager mm WHERE cv.course_id='$course_id' AND mm.id=cv.video_id AND ( mm.chap_id IN(SELECT  DISTINCT chapter_id FROM chapter_mapping WHERE chapter_id_mapping='$chapter_id') OR mm.chap_id IN(SELECT DISTINCT chapter_id_mapping FROM chapter_mapping WHERE chapter_id='$chapter_id')) AND mm.pathfilename IS NOT NULL");
					$rs_link256=mysql_num_rows($result_link256);
					if($rs_link256 > 0)
					{
						while($row_link256=mysql_fetch_array($result_link256))
							{
							if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll;overflow-y:auto' cellspacing='3'>";
			echo "<tr style='height:40px;'>
			<td style='width:3%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Ref.ID</font></b></td>
			<td style='width:57%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >File Name</font></b></td>
			<td style='width:20%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Number of access</font></b></td>";
			echo"</tr>";
						$total=1;
						}
								if($row_link256[3]=="")
								{
								}
								else
								{
											if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row_link256[3]|$row_link256[2]|vod' class='ck' value='$row_link256[2]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row_link256[2]."</font></td>";
							if($row_link256[7]=="")
							{
								echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$row_link256[0]."</font></td>";
							}
							else
							{
							$chapter="";
							$result_chap=mysql_query("SELECT name FROM `chapter` where id='$row_link256[7]'");
						while($row_chap=mysql_fetch_array($result_chap))
						{
						$chapter=$row_chap[0];
						}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."[".$row_link256[0]."]</font></td>";
							}
							/*if(strlen($row_link256[0])>20)
							{
							$stre=substr($row_link256[0],0,19);
							//$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$row_link256[0]."</font></td>";
							}*/
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND video_id='$row_link256[2]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";
							echo "</tr>";
							$rc=1;
								}
							}
					}
					//end chapter mapping
				if($rc==0)
		{
		if($total==1)
		{
		echo "<tr><td>
		</td><td>
		</td><td>No Data Available</td><td></td></tr>";
		}
		else
		{
		echo "No Data Available";
		}
		}
	}
	else
	{
	$result=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id FROM course_batch_material cb,document_manager_subjective dms WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' 
	$querystring order by srno DESC");
	
	$rc=0;
	$total=0;
	$rw = mysql_num_rows($result);
		if($rw == 0) 
		{
		
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				if($row[5]=='1')
				{
					$stulist=$row[6];
					if (strpos($stulist,$st_id_check))
					{
					}
					else
					{
					goto labelnewrec;
					}
				}
					if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll;overflow-y:auto' cellspacing='3'>";
			echo "<tr style='height:40px;'>
			<td style='width:3%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Ref.ID</font></b></td>
			<td style='width:57%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Chapter</font></b></td>
			<td style='width:20%;border-bottom:solid 1px;color:black;background-color: #4d90c9;'><b><font  color='white' >Number of access</font></b></td>";
			echo"</tr>";
			$total=1;
						}
						$chapter="";
						//$chapter=$row[3]." ".$row[4];
						$chapter="";
							//for chapter
							if($row[7]=="")
			{
					if($row[4]=="")
					{
					}
					else
					{
						$chapter=$row[3]."[".$row[4]."]";
					}
			}
			else
			{
					 if (strpos($row[7],",") !== false)
					 {
						 $chapter="";
						 $lst=explode(",",$row[7]);
						foreach($lst as $item)
						{
						if($item=="")
						{
						}
						else
						{
							$result_chap=mysql_query("SELECT name FROM `chapter` where id='$item'");
							while($row_chap=mysql_fetch_array($result_chap))
							{
							$chapter=$chapter.$row_chap[0].",";
							}
						}
						}
					 }
					 else
					 {
						 $result_chap=mysql_query("SELECT name FROM `chapter` where id='$row[7]'");
						while($row_chap=mysql_fetch_array($result_chap))
						{
						$chapter=$row_chap[0];
						}
					 }
				
					if($row[4]=="")
					{
					}
					else
					{
						if($chapter==$row[4])
						{
						
						}
						else
						{
						
						$chapter=$chapter."[".$row[4]."]";
						}
					}
					
			}
			
							/*if($row[4]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[7];
						
							if($chapter_list=="")
							{
							$chpater="";
							
							}
							else
							{
							
						
							
							 if (strpos($chapter_list,",") !== false)
				 {
				 $chapter="";
				 $lst=explode(",",$chapter_list);
				foreach($lst as $item)
				{
				if($item=="")
				{
				}
				else
				{
					$result_chap=mysql_query("SELECT name FROM `chapter` where id='$item'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$chapter=$chapter.$row_chap[0].",";
					}
				}
				}
				
				 }
				 else
				 {
				 $chapter="";
				 $result_chap=mysql_query("SELECT name FROM `chapter` where id='$chapter_list'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$chapter=$chapter.$row_chap[0].",";
					}
					
				 }
							}
							}
							else
							{
							$chapter=$row[3];
							
							}
								
							}
							else
							{
								$chapter=$row[4];
								
							}*/
							//end chapter
			/*if($row[3]=="")
			{
			$chapter=$row[4];
			}
			else
			{
			$chapter=$row[3];
			}*/
			if($material_type=="Questionpaper" && $examtype=="Objective")
			{
			//for checking answer key
										$testtaken="0";
										$result_link336=mysql_query("SELECT SUBSTR(documentcode,1,LENGTH(documentcode)-4) FROM `document_manager_subjective` WHERE srno='$row[0]'");
											$rs_link336=mysql_num_rows($result_link336);
										if($rs_link336 > 0)
										{
										$row_link336=mysql_fetch_array($result_link336);
										$q_name=$row_link336[0];
										$result_link337=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$q_name'");
										$rs_link37=mysql_num_rows($result_link337);
										$flg="0";
										if($rs_link37 > 0)
											{
											
											while($row_link337=mysql_fetch_array($result_link337))
												{
													$testtaken=$row_link337[1];
													if($testtaken=="1")
													{ 
														if($flg=="0")
														{
														
														
															if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							/*if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{
echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							}*/
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND document_id='$row[0]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";
							echo "</tr>";
							$rc=1;
															$flg="1";
														}
													}
												}
												
											}
											
									
										}
										//end checking answer key
			}
			else if($material_type=="Questionpaper" && $examtype=="Subjective")
			{
				//for checking answer key
					$testtaken="0";
					//echo "in else if";
									$result_link338=mysql_query("SELECT SUBSTR(documentcode,1,LENGTH(documentcode)-4) FROM `document_manager_subjective` WHERE srno='$row[0]'");
										$rs_link338=mysql_num_rows($result_link338);
										if($rs_link338 > 0)
										{
										//echo "in if";
										$row_link338=mysql_fetch_array($result_link338);
										$q_name=$row_link338[0];
										$result_link339=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$q_name'");
										$rs_link39=mysql_num_rows($result_link339);
										if($rs_link39==0)
													{
														$result_subt=mysql_query("SELECT dt.testid FROM documentid_testid_refer dt,document_manager_subjective d WHERE d.materialname='$q_name' AND dt.documentid=d.srno");
														$rs_linksubt=mysql_num_rows($result_subt);
														if($rs_linksubt>0)
														{
															while($row_linksubt=mysql_fetch_array($result_subt))
															{
															$result_link339=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$row_linksubt[0]'");
																$rs_link39=mysql_num_rows($result_link339);
															}
														}
													}
										$flg="0";
										if($rs_link39 > 0)
											{
											
											while($row_link339=mysql_fetch_array($result_link339))
												{
													$testtaken=$row_link339[1];
													if($testtaken=="1")
													{ 
														if($flg=="0")
														{
														
																if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							/*if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							}*/
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND document_id='$row[0]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";
							echo "</tr>";
							$rc=1;
															$flg="1";
														}
													}
												}
												
											}
											
									
										}
				//end checking answer key
			}
			else
			{
				if($j%2 == 0)
				{
					echo "<tr style='background-color:#e8f1f8;height:25px;'>";
					}
					else
					{
					echo "<tr style='background-color:#d2e3f1;height:25px;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							/*if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:57%;'><font  color='black' >".$chapter."</font></td>";
							}*/
							$result_acc=mysql_query("SELECT COUNT(id) FROM `menu_log_detail` WHERE user_id='$uid' AND document_id='$row[0]'");
							while($row_acc=mysql_fetch_array($result_acc))
							{
							$noaccess=$row_acc[0];
							}
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$noaccess."</font></td>";
							echo "</tr>";
							$rc=1;
			}
					
							
				labelnewrec:
			}
		}
		if($rc==0)
		{
		if($total==1)
		{
		echo "<tr><td>
		</td><td>
		</td><td>No Data Available</td><td></td></tr>";
		}
		else
		{
		echo "No Data Available";
		}
		}
	}
?>