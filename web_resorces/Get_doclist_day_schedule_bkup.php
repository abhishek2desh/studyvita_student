<?php
	include '../config.php';
	$fac_id=$_GET['fac_id'];
	$fac_name=$_GET['fac_name'];
	$examtype=$_GET['examtype'];
	$chap_id=$_GET['chap_id'];
	$doctype=$_GET['doc_type'];
	$material_type=$_GET['material_type'];
	$crs_id=$_GET['crs_id'];
	$wb_id=$_GET['wb_id'];
	$classtype=$_GET['classtype'];
	$chapter11=$chap_id.",";
	$chapter12=",".$chap_id.",";
	$querystring="";
$j=1;
	$total=0;
	if($material_type=="video")
	{
		if($classtype=="20")
		{
		
			$result=mysql_query("SELECT DISTINCT m.SubTopic,m.id,m.Pathfilename FROM media_manager m,working_batches_resources w WHERE m.pathfilename IS NOT NULL AND  m.id=w.video_id and w.working_batch_id='$wb_id' and w.link_to_class='1'");
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT m.SubTopic,m.id,m.Pathfilename FROM media_manager m,virtual_class_resources w WHERE m.pathfilename IS NOT NULL AND  m.id=w.video_id and w.virtual_class_id='$wb_id' and w.link_to_class='1'");
		
		}
		
		
		$rw = mysql_num_rows($result);
		if($rw == 0)
		{
		 echo "No Data Available";
		}
		else
		{
			echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0'>";
			echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Ref.ID</font></b></td>
			<td style='width:77%;border-bottom:solid 1px;color:black;'><b><font  color='black' >FileName</font></b></td>";
			echo"</tr>";
			while($row=mysql_fetch_array($result))
			{
			
				if($row[2]=="")
				{
				}
				else
				{
					if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[1]|vod' class='ck' value='$row[1]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[1]."</font></td>";
							if(strlen($row[0])>20)
							{
							$stre=substr($row[0],0,19);
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$row[0]."</font></td>";
							}
							echo "</tr>";
				}
			}
			echo "</table>";
		}
		
	}
	else if($material_type=="previouscompetitivepaper")
	{
		$querystring="Documenttype='$material_type' and testtype='$examtype'";
		if($classtype=="20")
		{
		$result=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject,d.description,d.chapter_id FROM document_manager_subjective d,working_batches_resources w  WHERE d.srno=w.document_id and  w.link_to_class='1' and w.working_batch_id='$wb_id' AND $querystring order by srno DESC");
		}
		else
		{
		$result=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject,d.description,d.chapter_id FROM document_manager_subjective d,virtual_class_resources w  WHERE d.srno=w.document_id and w.virtual_class_id='$wb_id' and w.link_to_class='1' AND $querystring order by srno DESC");
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
				$path1=$row[2];
				if($path1=="")
				{
				}
				else
				{
					
						
						
						$chk=substr($row[2], 0, 1);	
						$dir1 = substr($row[2],2);
						$dir1 = substr($dir1,0, -4);
						
						
						$ext = ".pdf";
						
							
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
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0'>";
			echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Ref.ID</font></b></td>
			<td style='width:77%;border-bottom:solid 1px;color:black;'><b><font  color='black' >Chapter</font></b></td>";
			echo"</tr>";
			echo"</tr>";
			$total=1;
						}
								if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							if($row[5]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[6];
						
							if($chapter_list=="")
							{
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:77%;'><font  color='black' ></font></td>";
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
				if(strlen($chapter)>20)
				{
				$stre=substr($chapter,0,19);
				echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
				}
				else
				{

				echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$chapter."</font></td>";
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
					if(strlen($chapter)>20)
				{
				$stre=substr($chapter,0,19);
				echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
				}
				else
				{
					echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$chapter."</font></td>";
					}
				 }
							}
							}
							else
							{
							if(strlen($row[3])>20)
				{
				$stre=substr($row[3],0,19);
				echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
				}
				else
				{
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$row[3]."</font></td>";
							}
							}
								
							}
							else
							{
								if(strlen($row[5])>20)
							{
							$stre=substr($row[5],0,19);
														echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

								echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$row[5]."</font></td>";
								}
							}
						
							
							echo "</tr>";
							$rc=1;
						}
						else
						{
							
						}
					
				}
			}
		}
		
		if($rc==0)
		{
		if($total==1)
		{
		echo "<tr><td>
		</td><td>
		</td><td>No Data Available</td></tr>";
		}
		else
		{
		echo "No Data Available";
		}
		}
	}
	else if($material_type=="Magazinelink")
	{
		//$result=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id,dms.PaperMonthYear,dms.magazine_id  
		$querystring="Documenttype='$material_type' ";
	if($classtype=="20")
		{
		$result=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject,d.description,d.chapter_id,d.PaperMonthYear,d.magazine_id FROM document_manager_subjective d,working_batches_resources w  WHERE d.srno=w.document_id and w.working_batch_id='$wb_id' and w.link_to_class='1' AND $querystring order by srno DESC");
		}
		else
		{
		$result=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject,d.description,d.chapter_id,d.PaperMonthYear,d.magazine_id  FROM document_manager_subjective d,virtual_class_resources w  WHERE d.srno=w.document_id and w.virtual_class_id='$wb_id'  and w.link_to_class='1' AND $querystring order by srno DESC");
		}
	
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
							
								$chapter_list="";
								$chapter_list=$row[6];
						
							if($chapter_list=="")
							{
							$chpater="";
							$chpater=$row[5];
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
							
								
							
							//end chapter
			
				$path1=$row[2];
				if($path1=="")
				{
				}
				else
				{
					
					
					if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0'>";
			echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Ref.ID</font></b></td>
			<td style='width:27%;border-bottom:solid 1px;color:black;border-right:solid 1px;'><b><font  color='black' >Chapter</font></b></td>";
			echo "<td style='width:25%;border-bottom:solid 1px;color:black;border-right:solid 1px;'><b><font  color='black' >Magazine Name</font></b></td>";
							echo "<td style='width:25%;border-bottom:solid 1px;color:black;'><b><font  color='black' >Month Year </font></b></td>";
			echo"</tr>";
			$total=1;
						}
						
							if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]|mzlink' class='ck' value='$row[0]' /></center></td>";

							
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
							$ch_len=strlen($chapter)/20;
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:27%;border-right:solid 1px'><font  color='black' >".$stre."</font></td>";
							}
							else
							{
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:27%;border-right:solid 1px'><font  color='black' >".$chapter."</font></td>";
							}
							
							$magazine_name="";
							$result_chap=mysql_query("SELECT name FROM `magazine_detail` where id='$row[8]'");
					while($row_chap=mysql_fetch_array($result_chap))
					{
					$magazine_name=$row_chap[0];
					}
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:25%;'><font  color='black' >".$magazine_name."</font></td>";
							echo "<td style='border-right:solid 0px;border-bottom:solid 1px;width:25%;'><font  color='black' >".$row[7]."</font></td>";
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

	else if($material_type=="ppt" || $material_type=="notes" ||  $material_type=="topperanswersheet" || $material_type=="Weblink" )
	{
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
		if($examtype=="")
		{
		if($material_type=="notes" )
		{
		$querystring="  (Documenttype='notes' or Documenttype='LectureNotes')";
		}
		else
		{
		$querystring="Documenttype='$material_type'";
		}
		
		}
		else
		{
		if($material_type=="notes" )
		{
		$querystring=" (Documenttype='notes' or Documenttype='LectureNotes') and examtype like '%$examtype%'";
		}
		else
		{
		$querystring="Documenttype='$material_type' and examtype like '%$examtype%'";
		}
		
		}
		if($classtype=="20")
		{
		$result=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject,d.description,d.chapter_id FROM document_manager_subjective d,working_batches_resources w  WHERE d.srno=w.document_id and w.working_batch_id='$wb_id' and w.link_to_class='1' AND $querystring order by srno DESC");
		}
		else
		{
		$result=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject,d.description,d.chapter_id  FROM document_manager_subjective d,virtual_class_resources w  WHERE d.srno=w.document_id and w.virtual_class_id='$wb_id'  and w.link_to_class='1' AND $querystring order by srno DESC");
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
				$path1=$row[2];
				if($path1=="")
				{
				}
				else
				{
					
					if($material_type=="Weblink" ||  $material_type=="Magazinelink")
					{
					if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0'>";
			echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Ref.ID</font></b></td>
			<td style='width:77%;border-bottom:solid 1px;color:black;'><b><font  color='black' >Chapter</font></b></td>";
			echo"</tr>";
			$total=1;
						}
							if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
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
							$chapter="";
							//for chapter
							if($row[5]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[6];
						
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
								$chapter=$row[5];
								
							}
							//end chapter
							if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
														echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$chapter."</font></td>";
							}
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
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0'>";
			echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Ref.ID</font></b></td>
			<td style='width:77%;border-bottom:solid 1px;color:black;'><b><font  color='black' >Chapter</font></b></td>";
			echo"</tr>";
			$total=1;
						}
								if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				$j++;
							
							echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
							
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							$chapter="";
							//for chapter
							if($row[5]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[6];
						
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
								$chapter=$row[5];
								
							}
							//end chapter
							if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
														echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$chapter."</font></td>";
							}
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
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0'>";
			echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Ref.ID</font></b></td>
			<td style='width:77%;border-bottom:solid 1px;color:black;'><b><font  color='black' >Chapter</font></b></td>";
			echo"</tr>";
			$total=1;
						}
									if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				$j++;
								
								echo "<td style='color:black;border:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$new_path|$row[0]|$row[1]' class='ck' value='$row[0]' /></center></td>";
								
								
								echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
								$chapter="";
							//for chapter
							if($row[5]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[6];
						
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
								$chapter=$row[5];
								
							}
							//end chapter
								if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
														echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

								echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$chapter."</font></td>";
								}
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
		</td><td>No Data Available</td></tr>";
		}
		else
		{
		echo "No Data Available";
		}
		}
	}
	else
	{
	$rc=0;
	$total=0;
		if($examtype=="")
		{
		$querystring="Documenttype='$material_type'";
		}
		else
		{
		$querystring="Documenttype='$material_type' and examtype like '%$examtype%'";
		}
		if($classtype=="20")
		{
		$result=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject,d.examtype,d.Documenttype,d.description,d.chapter_id FROM document_manager_subjective d,working_batches_resources w WHERE d.srno=w.document_id and w.working_batch_id='$wb_id' and w.link_to_class='1' AND $querystring order by d.srno DESC");
		}
		else
		{
		$result=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject,d.examtype,d.Documenttype,d.description,d.chapter_id FROM document_manager_subjective d,virtual_class_resources w WHERE d.srno=w.document_id and w.virtual_class_id='$wb_id'  and w.link_to_class='1' AND $querystring order by d.srno DESC");
	
		}

			
			
		
		$rw = mysql_num_rows($result);
		if($rw == 0)
		{
		
		
		goto labelA;
		}
		else
		{
		
			while($row=mysql_fetch_array($result))
			{
			$materialname_qus=$row[1]."_Qus";
			$materialname_qus_new="";
			$flg_obj=0;
				if(($row[5]=="Objective" &&  $row[6]=="Assignment") || ($row[5]=="Objective" &&  $row[6]=="Questionpaper"))
				{
				//echo "in if";
				$flg_obj=1;
				$result2=mysql_query("SELECT distinct srno,materialname,path,chapter,subject,examtype,Documenttype FROM document_manager_subjective  WHERE materialname='$materialname_qus'");
					while($row2=mysql_fetch_array($result2))
					{
					$srno_qus=$row2[0];
					$path1=$row2[2];
					$materialname_qus_new=$row2[1];
					}
				}
				else
				{
				$path1=$row[2];
				}
				
				if($path1=="")
				{
				}
				else
				{
					$sb1="";
					if($doctype == "eduserver")
					{
					if($row[4]=="14")
					{
					$sb1="Biology";
					}
					else if($row[4]=="15")
					{
					$sb1="Maths";
					}
					else if($row[4]=="16")
					{
					$sb1="Physics";
					}
					else if($row[4]=="17")
					{
					$sb1="Chemistry";
					}
					else if($row[4]=="18")
					{
					$sb1="Science";
					}
					else if($row[4]=="19")
					{
					$sb1="English";
					}
					else if($row[4]=="20")
					{
					$sb1="Mock";
					}
					else if($row[4]=="22")
					{
					$sb1="SocialScience";
					}
					
					else
					{
					$results=mysql_query("SELECT name FROM subject WHERE id='$row[4]'");
					while($rows=mysql_fetch_array($results))
					{
					$sb1=$rows[0];
					}		
					}
						
						
						if($flg_obj==1)
						{
						$val="GES_".$row[0]."_Qus";
						}
						else
						{
						$val="GES_".$row[0];
						}
						$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\GlobalEduServer_docs\\".$sb1."\\$examtype\\".$val.".pdf";
						
						if(file_exists($new_path))
						{
						if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0'>";
			echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Ref.ID</font></b></td>
			<td style='width:77%;border-bottom:solid 1px;color:black;'><b><font  color='black' >Chapter</font></b></td>";
			echo"</tr>";
			$total=1;
						}
								if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				$j++;
							if($flg_obj==1)
							{
							echo "<td style='color:black;border:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$path1|$srno_qus|$materialname_qus_new|$sb1' class='ck' value='$srno_qus' /></center></td>";
							}
							else
							{
							echo "<td style='color:black;border:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]|$sb1' class='ck' value='$row[0]' /></center></td>";
							}
							
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:20%;'><font  color='black' >".$row[0]."</font></td>";
							$chapter="";
							//for chapter
							if($row[7]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[8];
						
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
								$chapter=$row[7];
								
							}
							//end chapter
							if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
														echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$chapter."</font></td>";
							}
							echo "</tr>";
							$rc=1;
							
							
							
						}
						
					}
					else
					{
					if($flg_obj==1)
					{
					$chk=substr($path1, 0, 1);	
						$dir1 = substr($path1,2);
						$dir1 = substr($dir1,0, -4);
					}
					else
					{
					$chk=substr($row[2], 0, 1);	
						$dir1 = substr($row[2],2);
						$dir1 = substr($dir1,0, -4);
					}
						
						
						if($mattype=="ppt")
						{
							$ext = ".ppt";
							$new_path = "D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\ppt\\$row[1]".$ext;
						}
						else
						{
							$ext = ".pdf";
							$dir2 = $dir1.$ext;
							if($chk == "S")	{	$dt = "Edutech Materials";	}
							else if($chk == "U")	{	$dt = "EdutechData";	}
							else if($chk == "V")	{	$dt = "paresh";	}
							else if($chk == "R")	{	$dt = "Tempquestions";	}
							$server = "\\\ALNITEC-73N4CS8\\";
							$new_path = $server."$dt".$dir2;
							//echo $new_path ;
						}
						if(file_exists($new_path))
						{
						if($total==0)
						{
						echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0'>";
			echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:20%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Ref.ID</font></b></td>
			<td style='width:77%;border-bottom:solid 1px;color:black;'><b><font  color='black' >Chapter</font></b></td>";
			echo"</tr>";
			$total=1;
						}
								if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				$j++;
							if($flg_obj==1)
							{
							echo "<td style='color:black;border:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$path1|$srno_qus|$materialname_qus_new|0' class='ck' value='$srno_qus' /></center></td>";
							}
							else
							{
							echo "<td style='color:black;border:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='name_ck' id='$row[2]|$row[0]|$row[1]|0' class='ck' value='$row[0]' /></center></td>";
							}
							
							echo "<td style='border-right:solid 1px;width:20%;border-bottom:solid 1px;'><font  color='black' >".$row[0]."</font></td>";
							$chapter="";
							//for chapter
							if($row[7]=="")
							{
							if($row[3]=="")
							{
								$chapter_list="";
								$chapter_list=$row[8];
						
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
								$chapter=$row[7];
								
							}
							//end chapter
							if(strlen($chapter)>20)
							{
							$stre=substr($chapter,0,19);
														echo "<td style='border:solid 0px;border-bottom:solid 1px;width:77%;'><font  color='black' >".$stre."</font></td>";
							}
							else
							{

							echo "<td style='border:solid 0px;width:77%;border-bottom:solid 1px;'><font  color='black' >".$chapter."</font></td>";
							}
							echo "</tr>";
							$rc=1;
						}
					}
				}
			}
		}
		labelA:
		
	
		if($rc==0)
		{
		if($total==1)
		{
		echo "<tr><td>
		</td><td>
		</td><td>No Data Available</td></tr>";
		}
		else
		{
		echo "No Data Available";
		}
		}
	}
?>