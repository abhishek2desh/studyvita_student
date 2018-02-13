<?php 
	
	include_once '../config.php';
	
	$uid = $_GET['uid'];
	$sb = $_GET['sb'];
	$chap="";
	
	$result=mysql_query("SELECT distinct ps.Test_id,ps.UniqId,ps.TotalQuestion,ps.id,ps.TotalQuestion,DATE_FORMAT(ob.Examdate,'%d-%m-%Y'),ps.SubID FROM 
`personalassignment_studentwise` ps,objective_evolution ob,student_details sd
 WHERE ob.Quepaperid=ps.Test_id AND ps.student_id='$uid' AND ps.SubID='$sb' AND ob.studentid=sd.edutech_student_id AND sd.user_id=ps.student_id
 AND ps.Test_Submit NOT IN(1) AND ps.id NOT IN(SELECT id FROM personalassignment_studentwise 
WHERE Test_submit = '1' GROUP BY Test_id)  ORDER BY CAST( ps.Test_id AS SIGNED INTEGER) DESC");
	
	echo "<option value='0'>Select TestID</option>";
	while($row=mysql_fetch_array($result))
	{
		$chap="";
		$result1=mysql_query("SELECT c.name FROM adaptive_learning_test alt,chapter c WHERE alt.test_id='$row[0]' AND alt.student_id='$uid'
							AND c.id=alt.chapter_id ");
		$res=mysql_fetch_array($result1);
		$chap=$res[0];
		if($chap == "")
		{
			$result2=mysql_query("SELECT DISTINCT chapter,description FROM `document_manager_subjective`  WHERE documentcode='$row[0]'");
			$res=mysql_fetch_array($result2);
			$chap=$res[0]."-".$res[1];
			if($chap == "-")
			{
			$result3=mysql_query("SELECT DISTINCT dm.chapter,dm.description FROM `document_manager_subjective` dm,documentid_testid_refer dt WHERE dm.srno=dt.documentid and dt.testid='$row[0]'");
			$res3=mysql_fetch_array($result3);
			$chap=$res3[0]."-".$res3[1];
			echo "<option value='$row[0]-$row[1]-$row[3]-$row[4]'>$row[0] [$row[5]] [$chap]</option>";
			}
			else
			{
			echo "<option value='$row[0]-$row[1]-$row[3]-$row[4]'>$row[0] [$row[5]] [$chap]</option>";
			}
			
			
		}
		else
		{
			echo "<option value='$row[0]-$row[1]-$row[3]-$row[4]'>$row[0] [$row[5]] [$chap]</option>";
		}
		
	}
	include_once '../conn_close.php';
?>