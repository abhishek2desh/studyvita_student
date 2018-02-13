<?php
		include '../config.php';
		$mat_id=$_GET['mat_id'];
		$batch_id=$_GET['batch_id'];
		$downloadper=0;
	$result=mysql_query("SELECT c.`download_permission` FROM `course_batch_material` c,`document_manager_subjective` d
WHERE d.materialname='$mat_id' AND `doc_id`=d.srno AND c.batch_id='$batch_id' ");
		
			while($row=mysql_fetch_array($result))
			{
			$downloadper=$row[0];
			}
			echo $downloadper;
			
?>