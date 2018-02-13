<?php
	
		include_once '../config.php';
		session_start();
		$course_id=$_SESSION['course_id'];
			$uid=$_GET['uid'];
		//echo "crid-".$course_id;
		$sid=$_GET['sid'];
		$test_id=$_GET['test_id'];
		$chap_id=0;
		$combined_chapter="";
		$j=1;
		
			
			$result1=mysql_query("SELECT DISTINCT t.chapter_id FROM test_announce t,que_paper q WHERE q.name='$test_id' AND q.id=t.que_paper_id and t.user_id='$uid' ");
			
		
			while($row1=mysql_fetch_array($result1))
			{
			$chap_id=$row1[0];
			}
			
			if($chap_id=="0" || $chap_id=="")
			{
			$result1=mysql_query("SELECT DISTINCT c.id,t.chap_id FROM test_announce t,que_paper q,chapter c,course_type_mapping ct,course_chapter cc,batch b WHERE q.name='$test_id' AND q.id=t.que_paper_id and t.user_id='$uid' and c.ch_no=t.chap_id and b.id=t.batch_id and b.course_type_mapping_id=ct.id and ct.course_id=cc.course_id and c.id=cc.chap_id and (c.sub_id=t.sub_id or c.sub_id in(select distinct sub_id from subject_alias where rel_sub_id=t.sub_id)) ");
			while($row1=mysql_fetch_array($result1))
			{
			$chap_id=$row1[0];
			}
			}
			//echo "cghap".$chap_id;
			if($chap_id>0)
			{
			
				$result=mysql_query("SELECT DISTINCT m.Pathfilename,SUBSTRING(m.FilenameOnline,5),m.id FROM `media_manager` m,course_video cv WHERE  m.chap_id='$chap_id'  AND m.pathfilename is not null and m.id=cv.video_id and cv.course_id='$course_id'");
		
		$res=mysql_num_rows($result);
		if($res == 0)
		{
			//echo "<option value=''>No Data Available</option>";
			echo "No Data Available";
		}
		else
		{
		echo "<table style='width:100%'>";
					echo "<tr><td>Select Topic</td></tr>";
			//echo "<option value=''>Select Topic</option>";
			while($row=mysql_fetch_array($result))
			{	
if($j%2 == 0)
					{
					echo "<tr style='background-color:white;'>";
					
					
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					
					}
					echo "<td style='width:100%;border-bottom: 1px solid black;'><input type='radio' name='vd_radio' id='$row[0]|$row[2]' class='' value='' value='' />$row[1]</td>";
					echo "</tr>";
						$j++;			
				//echo "<option value='$row[0]|$row[2]'>$row[1]</option>";
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
				
					$result=mysql_query("SELECT DISTINCT m.Pathfilename,SUBSTRING(m.FilenameOnline,5),m.id FROM `media_manager` m,course_video cv WHERE  m.chap_id='$item'  AND m.pathfilename is not null and m.id=cv.video_id and cv.course_id='$course_id'");
					while($row=mysql_fetch_array($result))
					{		
					if($flg==0)
					{
					$flg=1;
					echo "<table style='width:100%'>";
					echo "<tr><td>Select Topic</td></tr>";
					//echo "<option value=''>Select Topic</option>";
					}
					if($j%2 == 0)
					{
					echo "<tr style='background-color:white;'>";
					
					
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					
					}
					echo "<td style='width:100%;border-bottom: 1px solid black;'><input type='radio' name='vd_radio' id='$row[0]|$row[2]' class='' value='' value='' />$row[1]</td>";
					echo "</tr>";
						$j++;
						//echo "<option value='$row[0]|$row[2]'>$row[1]</option>";
					}
				}
			}
			if($flg==0)
			{
				echo "No Data Available";
			}
			else
			{
			echo "</table>";
			}
			}
			
		}
		
		
?>