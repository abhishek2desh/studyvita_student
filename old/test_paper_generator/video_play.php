<?php
	
		include_once '../config.php';
		
		$conc_id=$_GET['conc_id'];
		
		$result=mysql_query("SELECT DISTINCT Pathfilename,SUBSTRING(FilenameOnline,5) FROM concept c,topic t,chapter cpt,media_manager md 
							WHERE c.id='$conc_id' AND t.id=c.topic_id AND t.chap_id=cpt.id AND md.chap_id=t.chap_id ");
		
		$res=mysql_num_rows($result);
		if($res == 0)
		{
			echo "<option value=''>No Data Available</option>";
		}
		else
		{
			echo "<option value=''>Select Video of Concept</option>";
			while($row=mysql_fetch_array($result))
			{			
				echo "<option value='$row[0]'>$row[1]</option>";
			}
		}
?>