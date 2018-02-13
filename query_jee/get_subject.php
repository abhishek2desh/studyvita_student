<?php
			
	include '../config.php';
	
	$sub=$_GET['sub'];

	$result_sub=mysql_query("SELECT DISTINCT  ap.subject,s.name FROM `adaptive_learning_test` ap,SUBJECT s WHERE SUBJECT='$sub' AND s.id=ap.subject");
	$row_sub=mysql_fetch_array($result_sub);
	$sb1=$row_sub[0];
	$sb_nm=$row_sub[1];
	
	if($sb1 == "14"){$sb='BIO';$sb2='6';}
	else if($sb1 == "16"){$sb='PHY';$sb2='1';}
	else if($sb1 == "17"){$sb='CHE';$sb2='2';}
	else if($sb1 == "15"){$sb='MAT';$sb2='3';}
	else if($sb1 == "18"){$sb='SCI';$sb2='7';}
	else if($sb1 == "19"){$sb='ENG';}
	else if($sb1 == "20"){$sb='MOC';}
	
	echo $sb."-".$sb2."-".$sb_nm."-".$sb1;
	
?>