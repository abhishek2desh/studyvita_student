<?php
	
		include_once '../config.php';

		$item=$_GET['sub_id'];
		$batch_id=$_GET['btid'];
		$chap_list=$_GET['chap_id'];
		$matid=$_GET['matid'];
		
		if($matid == "pq")
		{
			$str="AND dms.documenttype='Questionpaper' AND Examtype='Objective'";
		}
		else if($matid == "oa")
		{
			$str="AND dms.documenttype='Assignment' AND Examtype='Objective'";
		}
		$result=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$item' AND dms.chapter_id='$chap_list' $str ");
		
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
			echo "<option value=''>No Data Available.</option>";
		}
		else
		{
			echo "<option value=''>Select Material</option>";
		
			while($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[1]-$row[2]>$row[1]</option>";
			}
		}
		include_once '../conn_close.php';
?>