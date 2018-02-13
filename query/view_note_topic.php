<?php
	
		include_once '../config.php';
		
		$sid=$_GET['sid'];
		$uid=$_GET['uid'];
		$test_id=$_GET['test_id'];
		$chap_id=0;
		$combined_chapter="";
		$result1=mysql_query("SELECT chapter_id,combined_chapter,batch_id FROM `adaptive_learning_test` WHERE test_id='$test_id' ");
		$j=1;
			while($row1=mysql_fetch_array($result1))
			{
				$chap_id=$row1[0];
				$combined_chapter=$row1[1];
				$batch_id=$row1[2];
			}
			if($chap_id=="0" || $chap_id=="")
			{
			$result1=mysql_query("SELECT DISTINCT t.chapter_id FROM test_announce t,que_paper q WHERE q.name='$test_id' AND q.id=t.que_paper_id and t.user_id='$uid' ");
			
		
			while($row1=mysql_fetch_array($result1))
			{
			$chap_id=$row1[0];
			}
			}
			if($chap_id=="0" || $chap_id=="")
			{
			$result1=mysql_query("SELECT DISTINCT c.id,t.chap_id FROM test_announce t,que_paper q,chapter c,course_type_mapping ct,course_chapter cc,batch b WHERE q.name='$test_id' AND q.id=t.que_paper_id and t.user_id='$uid' and c.ch_no=t.chap_id and b.id=t.batch_id and b.course_type_mapping_id=ct.id and ct.course_id=cc.course_id and c.id=cc.chap_id and (c.sub_id=t.sub_id or c.sub_id in(select distinct sub_id from subject_alias where rel_sub_id=t.sub_id)) ");
			while($row1=mysql_fetch_array($result1))
			{
			$chap_id=$row1[0];
			}
			}
			//echo $chap_id;
			if($chap_id>0)
			{
				$ch_new="";
				$ch_new=$chap_id.",";
				$chap_mappingid="";
				$chapter_mappingid_new="";
								$result_mapping=mysql_query("SELECT DISTINCT chapter_id,`chapter_id_mapping` FROM `chapter_mapping` WHERE chapter_id='$chap_id' OR chapter_id_mapping='$chap_id'");
								while($row_mapping=mysql_fetch_array($result_mapping))
								{
									if($row_mapping[0]==$chap_id)
									{
									$chap_mappingid=$row_mapping[1];
									}
									else
									{
									$chap_mappingid=$row_mapping[0];
									}
								}
								if($chap_mappingid=="")
								{
								}
								else
								{
								$chapter_mappingid_new=$chap_mappingid.",";
								}
			if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND (dms.chapter_id='$chap_id' or dms.chapter_id='$ch_new') AND dms.documenttype='Notes'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id'  AND (dms.chapter_id='$chap_id' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Notes'");
											}
								
				
		
		$res=mysql_num_rows($result_link2);
		if($res == 0)
		{
			//echo "<option value=''>No Data Available</option>";
			echo "No Data Available";
		}
		else
		{
			//echo "<option value=''>Select Note</option>";
			echo "<table style='width:100%'>";
					echo "<tr><td>Select Note</td></tr>";

			while($row=mysql_fetch_array($result_link2))
			{	
		if($j%2 == 0)
					{
					echo "<tr style='background-color:white;'>";
					
					
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					
					}
					echo "<td style='width:100%;border-bottom: 1px solid black;'><input type='radio' name='nt_radio' id='$row[0]|$row[1]|$row[2]' class='' value='' value='' />$row[0]</td>";
					echo "</tr>";
						$j++;
				//echo "<option value='$row[0]|$row[1]|$row[2]'>$row[0]</option>";
			}
			echo "</table>";
		}
		}
		else
		{
			if($combined_chapter=="")
			{
			//echo "<option value=''>No Data Available</option>";
			echo "No Data Available";
			}
			else
			{
			$flg=0;
			$lst = explode(",", $combined_chapter);
			foreach($lst as $item) 
			{
				if($item=="")
				{
				}
				else
				{
				$chap_id=$item;
				$ch_new="";
				$ch_new=$chap_id.",";
				$chap_mappingid="";
				$chapter_mappingid_new="";
								$result_mapping=mysql_query("SELECT DISTINCT chapter_id,`chapter_id_mapping` FROM `chapter_mapping` WHERE chapter_id='$chap_id' OR chapter_id_mapping='$chap_id'");
								while($row_mapping=mysql_fetch_array($result_mapping))
								{
									if($row_mapping[0]==$chap_id)
									{
									$chap_mappingid=$row_mapping[1];
									}
									else
									{
									$chap_mappingid=$row_mapping[0];
									}
								}
								if($chap_mappingid=="")
								{
								}
								else
								{
								$chapter_mappingid_new=$chap_mappingid.",";
								}
			if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id'  AND (dms.chapter_id='$chap_id' or dms.chapter_id='$ch_new') AND dms.documenttype='Notes'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND (dms.chapter_id='$chap_id' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Notes'");
											}
								
					while($row=mysql_fetch_array($result_link2))
					{		
					if($flg==0)
					{
					$flg=1;
					echo "<table style='width:100%'>";
					echo "<tr><td>Select Note</td></tr>";
					//echo "<option value=''>Select Note</option>";
					
					}
					if($j%2 == 0)
					{
					echo "<tr style='background-color:white;'>";
					/*echo "<td style='width:100%;border-bottom: 1px solid black;'><input type='radio' name='nt_radio' id='$row[0]|$row[1]|$row[2]' class='' value='' value='' />$row[0]</td>";
					echo "<td><option value='$row[0]|$row[1]|$row[2]'   style='background-color:white;'>$row[0]</option></td>";*/
					
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					
					}
					echo "<td style='width:100%;border-bottom: 1px solid black;'><input type='radio' name='nt_radio' id='$row[0]|$row[1]|$row[2]' class='' value='' value='' />$row[0]</td>";
					echo "</tr>";
						$j++;
					}
				}
			}
			if($flg==0)
			{
				//echo "<option value=''>No Data Available</option>";
				echo "No Data Available";
			}
			else
			{
			echo "</table>";
			}
			}
			
		}
		
		
?>