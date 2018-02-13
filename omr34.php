<?php
		//$filename = "images/omr_sheet".".pdf";
		$filename = "OMR_Answer_Sheet".".pdf";
		$buffer = file_get_contents($filename);
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/octet-stream");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . strlen($buffer));
		header("Content-Disposition: attachment; filename=$filename");
		echo $buffer;
		
?>