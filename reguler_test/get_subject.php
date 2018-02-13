<?php
			
	include '../config.php';
	
	$uniq_id_get=$_GET['uniq_id_get'];
	$get_test_id1=$_GET['get_test_id1'];
	$qno=$_GET['qno'];
	$qno=$qno+1;
	$result_sub=mysql_query("SELECT SUBJECT FROM `onlinequestionbank` WHERE UniqId='$uniq_id_get'");
	$row_sub=mysql_fetch_array($result_sub);
	$sb1=$row_sub[0];
	
	/*$result_sub1=mysql_query("SELECT sc.subject,sc.SubID FROM `omrcorrect` om,`subjectcode` sc WHERE sc.SubID=om.SubID AND om.TestID='$get_test_id1' AND om.Qno='$qno'");
	$row_sub1=mysql_fetch_array($result_sub1);
	$sb12=$row_sub1[0];
	$sb2=$row_sub1[1];
	*/
	if($sb1 == "BIO"){$sb='Biology';$sb2='6';}
	else if($sb1 == "PHY"){$sb='Physics';$sb2='1';}
	else if($sb1 == "CHE"){$sb='Chemistry';$sb2='2';}
	else if($sb1 == "MAT"){$sb='Maths';$sb2='3';}
	else if($sb1 == "SCI"){$sb='Science';$sb2='7';}
	else if($sb1 == "ENG"){$sb='English';}
	else if($sb1 == "MOC"){$sb='Mock';}
	
	echo $sb;
	
?>