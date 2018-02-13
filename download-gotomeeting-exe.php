<?php
		include 'config.php';
		$filename="D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\Gotomeeting\\GoToMeeting Launcher.exe";
		$filenm="GoToMeeting Launcher.exe";
		
		$buffer = file_get_contents($filename);
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/octet-stream");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . strlen($buffer));
		header("Content-Disposition: attachment; filename=$filenm");
		echo $buffer;
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		$srcfile='C:\Documents and Settings\Administrator\My Documents\Downloads\$filenm';
		$dstfile='C:\testdirectory\$filenm';
		copy($srcfile, $dstfile);
?>