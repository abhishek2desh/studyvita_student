<?php

	include_once '../config.php';
	//quepapergenid insert document_man_refid ready to generate true ;
	$sub1=$_GET['sub'];	
	$fac_id=$_GET['fac_id'];	
	$board=$_GET['board'];	
	$dc=$_GET['dc'];	
	$et1=$_GET['et'];	
	$cp=$_GET['cp'];	
	$std=$_GET['std'];	
	$path=$_GET['path'];	
	$test_date=$_GET['test_date'];	
	$uniqid2=$_GET['uid'];
	$uniqid=substr($uniqid2, 0, -1);
	/*$sub=$_GET['sub']="BIO";	
	$fac_id=$_GET['fac_id']="2686";	
	$board=$_GET['board']=1;	
	$dc=$_GET['dc']='Assignment';	
	$et=$_GET['et']='Subjective';	
	$cp=$_GET['cp']='10';	
	$std=$_GET['std']='12';	
	$path=$_GET['path']="R:\\\Questionpaper\\objective\\";	
	$test_date=$_GET['test_date']="2013-09-23";	
	$uniqid=$_GET['uniqid']="6414,6415";*/
	
	if($sub1 == 14)
	{
		$sub="BIO";
	}
	else if($sub1 == 15)
	{
		$sub="MAT";
	}
	else if($sub1 == 16)
	{
		$sub="PHY";
	}
	else if($sub1 == 17)
	{
		$sub="CHE";
	}
	else if($sub1 == 18)
	{
		$sub="SCI";
	}
	else if($sub1 == 19)
	{
		$sub="ENG";
	}
	else if($sub1 == 22)
	{
		$sub="S.S";
	}
	/*if($std1=5)
	{
		$std='12';
	}
	else if($std1=4)
	{
		$std='11';
	}
	else if($std1=3)
	{
		$std='10';
	}
	else if($std1=2)
	{
		$std='9';
	}
	else if($std1=1)
	{
		$std='8';
	}*/
	if($et1 === 1)
	{
		$et="Subjective";
	}
	else
	{
		$et="Objective";
	}
	
	$result1=mysql_query("SELECT MAX(Srno) FROM document_manager_refid");
	
	$row1=mysql_fetch_array($result1);
	$max_id_doc_ref=$row1[0]+1;
	
	$srno_temp=$max_id_doc_ref-1;
	
	$insert_dmf=mysql_query("INSERT INTO document_manager_refid(`Srno`,`Srno_Temp`)
					   VALUES('$max_id_doc_ref','$srno_temp')");
	if($insert_dmf)
	{
		//echo "foirers table ";
	}
	
	else
	{
		//echo "Failed ";
	}
	$no=1;
	//$lst = explode(",", $uniqid);
	if($dc === 'Assignment')
	{
		$mat_name1="AsntDM1".$max_id_doc_ref.$sub.$std."_E";
		$mat_name2="AsntDM1".$max_id_doc_ref.$sub.$std."_E_Qus";
		$mat_name3="AsntDM1".$max_id_doc_ref.$sub.$std."_E_Ans";
		$mat_name4="AsntDM1".$max_id_doc_ref.$sub.$std."_E.doc";
		$mat_name5="AsntDM1".$max_id_doc_ref.$sub.$std."_E_Qus.doc";
		$mat_name6="AsntDM1".$max_id_doc_ref.$sub.$std."_E_Qus.xls";
		$path1=$path."\\".$mat_name4;
		$path2=$path."\\".$mat_name5;
		$path3=$path."\\".$mat_name6;
	}
	else
	{
		$mat_name1=$sub."_".$fac_id."_".$max_id_doc_ref;
		$mat_name2=$sub."_".$fac_id."_".$max_id_doc_ref."_Qus";
		$mat_name3=$sub."_".$fac_id."_".$max_id_doc_ref."_Ans";
		$mat_name4=$sub."_".$fac_id."_".$max_id_doc_ref.".doc";
		$mat_name5=$sub."_".$fac_id."_".$max_id_doc_ref."_Qus".".doc";
		$mat_name6=$sub."_".$fac_id."_".$max_id_doc_ref."_Ans".".xls";
		$path1=$path."\\".$mat_name4;
		$path2=$path."\\".$mat_name5;
		$path3=$path."\\".$mat_name6;
	}
	
	
	$rs3=mysql_query("INSERT INTO document_manager_subjective(`Srno`,`MaterialName`,
	`Subject`,`Board`,`Chapter`,`Standard`,`Documenttype`,`Examtype`,`Documentcode`,`Faculty`,`Path`,`Testdate`)	VALUES('$max_id_doc_ref','$mat_name1','$sub1','$board','$cp','$std','$dc','$et','$mat_name1','$fac_id','$path1','$test_date')");
	if($rs3)
	{
		//echo "Paper Generated Successfully";
	}
	else
	{
		//echo "Paper Generation Failed";
	}
	$result11=mysql_query("SELECT MAX(Srno) FROM document_manager_refid");
	$row11=mysql_fetch_array($result11);
	$max_id_doc_ref11=$row11[0]+1;
	$srno_temp1=$max_id_doc_ref11-1;
	$insert_dmf11=mysql_query("INSERT INTO document_manager_refid(`Srno`,`Srno_Temp`)
					   VALUES('$max_id_doc_ref11','$srno_temp1')");
	if($insert_dmf11)
	{
		//echo "foirers table ";
	}
	
	else
	{
		//echo "Failed 2";
	}
	$rs4=mysql_query("INSERT INTO document_manager_subjective(`Srno`,`MaterialName`,
	`Subject`,`Board`,`Chapter`,`Standard`,`Documenttype`,`Examtype`,`Documentcode`,`Faculty`,`Path`,`Testdate`)	VALUES('$max_id_doc_ref11','$mat_name2','$sub1','$board','$cp','$std','$dc','$et','$mat_name2','$fac_id','$path2','$test_date')");
	if($rs4)
	{
		//echo "Paper Generated Successfully";
	}
	else
	{
		//echo "Paper Generation Failed";
	}
	//$max_id_doc_ref3=$max_id_doc_ref2+1;
	
	$result12=mysql_query("SELECT MAX(Srno) FROM document_manager_refid");
	$row12=mysql_fetch_array($result12);
	
	$max_id_doc_ref12=$row12[0]+1;
	$srno_temp2=$max_id_doc_ref12-1;
	
	$insert_dmf12=mysql_query("INSERT INTO document_manager_refid(`Srno`,`Srno_Temp`)
					   VALUES('$max_id_doc_ref12','$srno_temp2')");
	if($insert_dmf12)
	{
		//echo "foirers table ";
	}
	
	else
	{
		//echo "Failed 4";
	}
	$rs5=mysql_query("INSERT INTO document_manager_subjective(`Srno`,`MaterialName`,
	`Subject`,`Board`,`Chapter`,`Standard`,`Documenttype`,`Examtype`,`Documentcode`,`Faculty`,`Path`,`Testdate`)	VALUES('$max_id_doc_ref12','$mat_name3','$sub1','$board','$cp','$std','$dc','$et','$mat_name3','$fac_id','$path3','$test_date')");
	if($rs5)
	{
		//echo "Paper Generated Successfully";
	}
	else
	{
		//echo "Paper Generation Failed";
	}
	$lst = explode(",", $uniqid);
	foreach($lst as $item) 
	{
		$rs6=mysql_query("INSERT INTO qpapergenqid(`DocumentID`,`Qno`,`QUID`,`ReadyToGenerate`,`DocGenerateFlag`)
		VALUES('$max_id_doc_ref','$no','$item','0','0')");
		
		if($rs6)
		{
			//echo "Paper Generated Successfully";
		}
		else
		{
			//echo "Paper Generation Failed";
		}
		$no++;
	}
	$update_query=mysql_query("UPDATE qpapergenqid SET ReadyToGenerate='1' WHERE DocumentID='$max_id_doc_ref'");
	if($update_query)
	{
		//echo "Paper Generated Successfully";
	}
	else
	{
		//echo "Paper Generation Failed";
	}
	
	echo "Paper Generated Successfully";
	
	
	
	/*$sub=$_GET['sub']="BIO";	
	$fac_id=$_GET['fac_id']="2686";	
	$board=$_GET['board']=1;	
	$dc=$_GET['dc']='Assignment';	
	$et=$_GET['et']='Subjective';	
	$cp=$_GET['cp']='10';	
	$std=$_GET['std']='12';	
	$path=$_GET['path']="R:\\\Questionpaper\\objective\\";	
	$test_date=$_GET['test_date']="2013-09-23";	
	$uniqid=$_GET['uniqid']="6414,6415";
	*/
	include_once '../conn_close.php';
?>