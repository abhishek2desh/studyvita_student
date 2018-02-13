<?php 
	include_once '../config.php';

	
	$tid_test = $_GET['tid_test'];
	$cid_test=0;
	$cfees=0;
	$resultc=mysql_query("SELECT DISTINCT c.id,c.course_fees FROM course c,batch b,`course_type_mapping` ctm,test_announce t WHERE t.que_paper_id='$tid_test' AND b.id=t.batch_id AND b.course_type_mapping_id=ctm.id AND c.id=ctm.course_id");
	while($rowc=mysql_fetch_array($resultc))
	{
		$cid_test=$rowc[0];
		$cfees=$rowc[1];
	}
	echo $cid_test."|".$cfees;
?>