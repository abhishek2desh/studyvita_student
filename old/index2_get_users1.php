<?php
	include 'config.php';
	
	session_start();
	
	$dt1 = $_SESSION['dt1'];
	$dt2 = $_SESSION['dt2'];
	$sub1 = $_SESSION['sub'];
	$type1 = $_SESSION['type'];
	$s1=$_SESSION['studid1'];
	$s3=$_SESSION['grp1'];
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	
	$ExamDate = isset($_POST['ExamDate']) ? mysql_real_escape_string($_POST['ExamDate']) : '';	
	$absent = isset($_POST['absent']) ? mysql_real_escape_string($_POST['absent']) : '';
	$SUBJECT = isset($_POST['SUBJECT']) ? mysql_real_escape_string($_POST['SUBJECT']) : '';	
	$QuePaperId = isset($_POST['QuePaperId']) ? mysql_real_escape_string($_POST['QuePaperId']) : '';	
	$TotalMarks = isset($_POST['TotalMarks']) ? mysql_real_escape_string($_POST['TotalMarks']) : '';	
	$ObtainedMarks = isset($_POST['ObtainedMarks']) ? mysql_real_escape_string($_POST['ObtainedMarks']) : '';	
	$Toppers_mark = isset($_POST['Toppers_mark']) ? mysql_real_escape_string($_POST['Toppers_mark']) : '';	
	$Batch_Avg = isset($_POST['Batch_Avg']) ? mysql_real_escape_string($_POST['Batch_Avg']) : '';	
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$rs = mysql_query("select count(*) from objective_evolution UNION ALL
	select count(*) from subjectiveevalution");// . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	
	if($sub1 == 17)
	{
		$sub1 = 'CHE';
	}
	else if($sub1 == 15)
	{
		$sub1 = 'MAT';
	}
	else if($sub1 == 16)
	{
		$sub1 = 'PHY';
	}
	else if($sub1 == 14)
	{
		$sub1 = 'BIO';
	}
	else if($sub1 == 18)
	{
		$sub1 = 'SCI';
	}
	else if($sub1 == 19)
	{
		$sub1 = 'ENG';
	}
	
	if($type1 == 0)
	{
		if($sub1 == 20)
		{
			$rs = mysql_query("
			SELECT ExamDate,StudentId,QuePaperId,SUBJECT,IF(absent = 1,'Absent','Present') absent,TotalMarks,ObtainedMarks,Toppers_Mark,Batch_Avg
			FROM subjectiveevalution
			WHERE ExamDate BETWEEN '".$dt1."' AND '".$dt2."' AND StudentId=".$s1."");
			$rw=mysql_num_rows($rs);
			$result["total"] = $rw;
		}
		else
		{
			$rs = mysql_query("
			SELECT ExamDate,StudentId,QuePaperId,SUBJECT,IF(absent = 1,'Absent','Present') absent,TotalMarks,ObtainedMarks,Toppers_Mark,Batch_Avg
			FROM subjectiveevalution
			WHERE ExamDate BETWEEN '".$dt1."' AND '".$dt2."' AND SUBJECT='".$sub1."' AND StudentId=".$s1."");
			$rw=mysql_num_rows($rs);
			$result["total"] = $rw;
		}
	}
	else if($type1 == 1)
	{
		if($sub1 == 20)
		{
			$rs = mysql_query("SELECT ExamDate,StudentId,QuePaperId,SUBJECT,IF(absent = 1,'Absent','Present') absent,TotalMarks,ObtainedMarks,Toppers_Mark,Batch_Avg
			FROM objective_evolution 
			WHERE ExamDate BETWEEN '".$dt1."' AND '".$dt2."' AND StudentId=".$s1."
			");
			$rw=mysql_num_rows($rs);
			$result["total"] = $rw;
		}
		else
		{
			$rs = mysql_query("SELECT ExamDate,StudentId,QuePaperId,SUBJECT,IF(absent = 1,'Absent','Present') absent,TotalMarks,ObtainedMarks,Toppers_Mark,Batch_Avg
			FROM objective_evolution 
			WHERE ExamDate BETWEEN '".$dt1."' AND '".$dt2."' AND SUBJECT='".$sub1."' AND StudentId=".$s1."
			");
			$rw=mysql_num_rows($rs);
			$result["total"] = $rw;
		}
	}
	else 
	{
		if($sub1 == 20)
		{
			$rs = mysql_query("SELECT ExamDate,StudentId,QuePaperId,SUBJECT,IF(absent = 1,'Absent','Present') absent,TotalMarks,ObtainedMarks,Toppers_Mark,Batch_Avg
			FROM objective_evolution 
			WHERE ExamDate BETWEEN '".$dt1."' AND '".$dt2."' AND StudentId=".$s1."
			UNION ALL
			SELECT ExamDate,StudentId,QuePaperId,SUBJECT,IF(absent = 1,'Absent','Present') absent,TotalMarks,ObtainedMarks,Toppers_Mark,Batch_Avg
			FROM subjectiveevalution
			WHERE ExamDate BETWEEN '".$dt1."' AND '".$dt2."' AND StudentId=".$s1."");
			$rw=mysql_num_rows($rs);
			$result["total"] = $rw;
		}
		else
		{
			$rs = mysql_query("SELECT ExamDate,StudentId,QuePaperId,SUBJECT,IF(absent = 1,'Absent','Present') absent,TotalMarks,ObtainedMarks,Toppers_Mark,Batch_Avg
			FROM objective_evolution 
			WHERE ExamDate BETWEEN '".$dt1."' AND '".$dt2."' AND SUBJECT='".$sub1."' AND StudentId=".$s1."
			UNION ALL
			SELECT ExamDate,StudentId,QuePaperId,SUBJECT,IF(absent = 1,'Absent','Present') absent,TotalMarks,ObtainedMarks,Toppers_Mark,Batch_Avg
			FROM subjectiveevalution
			WHERE ExamDate BETWEEN '".$dt1."' AND '".$dt2."' AND SUBJECT='".$sub1."' AND StudentId=".$s1."");
			$rw=mysql_num_rows($rs);
			$result["total"] = $rw;
		}
	}
	
	$items = array();
	//$items_count=0;
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		//$items_count++;
	}
	$result["rows"] = $items;
	echo json_encode($result);
	include 'conn_close.php';
?>