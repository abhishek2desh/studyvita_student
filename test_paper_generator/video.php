<?php
	
		include_once '../config.php';
		
		$batch_id=$_GET['batch_id'];
		$chapter_video=$_GET['chapter_video'];
		$subject_id=$_GET['subject_id'];
		
		$result_query=mysql_query("SELECT br.name,st.name,b.medium,st.id,br.id FROM batch b,board br,standard st WHERE b.id='$batch_id' 
							 AND st.id=b.standard_id AND br.id=b.board_id");
		$row_query=mysql_fetch_array($result_query);				 
		$board=$row_query[0];
		$std2=$row_query[1];
		$medium=$row_query[2];
		$std=$row_query[3];
		$board1=$row_query[4];
		
		if($medium == 'English')
		{
			$med='Eng';
		}
		else if($medium == 'Gujarati')
		{
			$med='Guj';
		}
		
		if($subject_id == '14'){ $sb1="BIOLOGY";}
		else if($subject_id == '15'){ $sb1="MATHEMATICS";}
		else if($subject_id == '16'){ $sb1="PHYSICS";}
		else if($subject_id == '17'){ $sb1="CHEMISTRY";}
		else if($subject_id == '18'){ $sb1="SCIENCE";}
		
		
		$result=mysql_query("SELECT DISTINCT Pathfilename,SUBSTRING(FilenameOnline,5) FROM `media_manager` WHERE board='CBSE' AND standard='$std2' AND `subject`='$sb1' AND  Chaptername='$chapter_video' AND `Medium`='Eng' AND Pathfilename NOT IN('')");
		
		$res=mysql_num_rows($result);
		if($res == 0)
		{
			echo "<option value=''>No Data Available</option>";
		}
		else
		{
			echo "<option value=''>Select Topic</option>";
			while($row=mysql_fetch_array($result))
			{			
				echo "<option value='$row[0]'>$row[1]</option>";
			}
		}
?>