<?php

	include_once 'config.php';
	session_start();
	$stud_id1=$_SESSION['studid1'];
	
	$s1 = $_GET['s'];

	if($s1 == 17)
	{
		$s1 = 'CHE';
	}
	else if($s1 == 15)
	{
		$s1 = 'MAT';
	}
	else if($s1 == 16)
	{
		$s1 = 'PHY';
	}
	else if($s1 == 14)
	{
		$s1 = 'BIO';
	}
	else if($s1 == 18)
	{
		$s1 = 'SCE';
	}
	else if($s1 == 19)
	{
		$s1 = 'ENG';
	}
	
	if($s1 == 20)
	{
		$result = mysql_query("SELECT ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
			@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness 
			FROM objective_evolution 
			WHERE StudentId=".$stud_id1." AND absent=0
			UNION ALL
			SELECT ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
			@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness 
			FROM subjectiveevalution
			WHERE StudentId=".$stud_id1." AND absent=0");
	}
	else
	{
		
		$result = mysql_query("SELECT ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
			@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness 
			FROM objective_evolution 
			WHERE SUBJECT='".$s1."' AND StudentId=".$stud_id1." AND absent=0
			UNION ALL
			SELECT ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
			@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness 
			FROM subjectiveevalution
			WHERE SUBJECT='".$s1."' AND StudentId=".$stud_id1." AND absent=0");
	}
	$array = array();

	$num_rows = mysql_num_rows($result);
	$i=0;
	echo "[";
	while($row = mysql_fetch_array($result)) { 
		$i++;
		
		if($i<$num_rows){
			echo $link = $row[0].",";
		}
		else {
			echo $link = $row[0];
		}
	}
	echo "]";	
	include 'conn_close.php';

?>