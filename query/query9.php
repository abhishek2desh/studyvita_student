<?php
	session_start();
//	require_once '../includes/global.inc.php';
	include_once '../config.php';
	
	$s5=$_SESSION['sid'];
	
	if(!isset($_SESSION['username']))
	{
		header("Location:login.php");
	}

	if(isset($_GET['dt']))
	{
		$result=mysql_query("SELECT * FROM material WHERE
		id IN (SELECT sol_id FROM sol_mapping WHERE mat_id=".$_GET['dt'].")
		OR
		id IN (SELECT report_id FROM report_mapping WHERE stud_id=$s5 AND test_id=".$_GET['dt'].")");
		while($row=mysql_fetch_array($result))
		{
			echo "<option value=$row[2]>$row[2]</option>";
		}
	}
	
	/*
	
	SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description 
	FROM material m,document_manager_subjective dc,sol_mapping sm,report_mapping rp
	WHERE m.Documentmanager_RefID=dc.Srno AND sm.mat_id='6593' AND rp.stud_id='3214' AND (m.id=sm.sol_id OR m.id=rp.report_id)
	
	*/
	include_once '../conn_close.php';
?>