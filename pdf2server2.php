<?php
	//echo $_GET['dt1'];
	
	$studid = $_GET['dt1'];
	
	
	$link = mysql_connect("localhost","edutechviewer34","edutechviewer34") or die(mysql_error());
//	$link = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("learning34") or die(mysql_error());
	
	$studid = mysql_real_escape_string($studid, $link);
	
	
//	$result=mysql_query("SELECT m.material_name FROM material m,student s,report_mapping rp  WHERE s.edutech_student_id=". $studid." AND s.id=rp.stud_id AND rp.report_id=m.id");
	
	$result=mysql_query("SELECT m.material_name,m.id FROM material m,student s,report_mapping rp  
			WHERE s.edutech_student_id=".$studid." AND s.id=rp.stud_id AND rp.report_id=m.id
			ORDER BY m.id ASC LIMIT 1,2");
	
	
	while($row=mysql_fetch_array($result))
	{
		$file = $row[0] . ".pdf";
		$path = "C:/inetpub/swf/test_flexpaper_docs/";
		$fullfile = $path.$file;
		if (file_exists($fullfile)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header("Content-Type: application/force-download");
			header('Content-Disposition: attachment; filename=' . urlencode(basename($file)));
			// header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($fullfile));
			ob_clean();
			flush();
			readfile($fullfile);
			exit;
		}			
	}
?>