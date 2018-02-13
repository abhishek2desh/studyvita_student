<?php
		include_once '../config.php';
		
		$variabl="Successfully Inserted";
		$req_que=$_GET['req_que'];		
		$uid=$_GET['uid'];
		$uid2=substr($uid, 0, -1);
		$cv=$_GET['cv'];
		$cv1=substr($cv, 0, -1);
		$count_cv=substr_count($cv1, ",");
		$count_cv1=$count_cv+1;
		
		$result=mysql_query("SELECT MAX(id) FROM tempquepaperdocid");
		$row=mysql_fetch_array($result);
		$max_id_get=$row[0]+1;
		
		$rs1=mysql_query("INSERT INTO tempquepaperdocid(`id`)VALUES('$max_id_get')");
		if($rs1)
		{
			echo $variabl;
		}
		else
		{
			echo "Failed ";
		}
		$lst = explode(",", $uid2);
		foreach($lst as $item) 
		{
			$rs1=mysql_query("INSERT INTO tempquestionid_checking(`TempDocID`,`Uniqid`,Qno,Topic_id,Checking_Done,Ready_forChecking,
			Mark_For_Deletion)VALUES('$max_id_get','$item','$count_cv','NULL','0','1','0')");
			if($rs1)
			{
				echo $variabl;
			}
			else
			{
				echo "Failed ";
			}
		}
		$result1=mysql_query("SELECT MAX(Srno) FROM document_manager_refid");
		$row1=mysql_fetch_array($result1);
		$max_id_doc_ref=$row1[0]+1;
		$subject="BIO_";
		$fac_id="2688_";
		$que="_Qus";
		$board=1;
		$Documenttype='Assignment';
		$Examtype="Subjective";
		$chapter=10;
		$Standard=5;
		$path="R:\\QuestionData\\6414.doc";
		$test_date="2013-09-20";
		$material_name=$subject.$fac_id.$max_id_doc_ref.$que;
		$matrial=$subject.$fac_id.$max_id_doc_ref;
		$rs3=mysql_query("INSERT INTO document_manager_subjective(`Srno`,`MaterialName`,
		`Subject`,`Board`,`Chapter`,`Standard`,`Documenttype`,`Examtype`,`Path`,`Testdate`)
		VALUES('$max_id_doc_ref','$material_name','$subject','$board','$chapter','$Standard','$Documenttype','$Examtype','$path','$test_date')");
		if($rs3)
		{
			echo $variabl;
		}
		else
		{
			echo "Failed ";
		}
		
		$srno_temp=$max_id_doc_ref-1;
		
		$insert_dmf=mysql_query("INSERT INTO document_manager_refid(`Srno`,`Srno_Temp`)
						   VALUES('$max_id_doc_ref','$srno_temp')");
		if($insert_dmf)
		{
			echo $variabl;
		}
		
		else
		{
			echo "Failed ";
		}
		
		$sr_no_id=($max_id_doc_ref+1);
		$rs2=mysql_query("INSERT INTO document_manager_subjective(`Srno`,`MaterialName`,
		`Subject`,`Board`,`Chapter`,`Standard`,`Documenttype`,`Examtype`,`Path`,`Testdate`)
		VALUES('$sr_no_id','$matrial','$subject','$board','$chapter','$Standard','$Documenttype','$Examtype','$path','$test_date')");

		if($rs2)
		{
			echo $variabl;
		}
		else
		{
			echo "Failed ";
		}
		include_once '../conn_close.php';
?>