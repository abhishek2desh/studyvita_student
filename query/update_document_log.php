<?php
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];
	$end_time= $_GET['end_time'];
	$page_source = $_GET['page_source'];	
	$mat_id=0;
	require_once("../config.php");
	if (is_numeric($docid)) 
	{
	
	}
	else
	{
	$result1=mysql_query("select srno from document_manager_subjective where MaterialName='$docid'");
	while($row1=mysql_fetch_array($result1))
			{
			$mat_id=$row1[0];
			}
	}
	if($mat_id==0)
	{
	$docid=substr($docid, 0,-4);
	$result1=mysql_query("select srno from document_manager_subjective where MaterialName='$docid'");
	while($row1=mysql_fetch_array($result1))
			{
			$mat_id=$row1[0];
			}
	}
	$sql = "update  Document_log_detail set end_time='$end_time' where document_id='$mat_id' and user_id='$user' and start_time='$start_time' and page_source='$page_source'";

	$result = mysql_query($sql);
	if ($result)
	{
		//echo "success...";
	}
	else
	{
		//echo "failed...";
	}
	//include_once '../conn_close.php';
?>