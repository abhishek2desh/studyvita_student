<?php
		include_once '../config.php';
		
		$variabl="Successfully Inserted";
		$req_que=$_GET['req_que'];		
		$st_value=$_GET['st_value'];		
		$uid=$_GET['uid'];
		$uid2=substr($uid, 0, -1);
		$cv=$_GET['cv'];
		$cv1=substr($cv, 0, -1);
		$count_cv=substr_count($cv1, ",");
		$count_cv1=$count_cv+1;
		$result=mysql_query("SELECT MAX(id) FROM tempquepaperdocid");
		$row=mysql_fetch_array($result);
		$max_id_get=$row[0]+1;
		//echo "new sts value : ".$st_value;
		$rs1=mysql_query("INSERT INTO tempquepaperdocid(`id`)VALUES('$max_id_get')");
		if($rs1)
		{
			//echo $variabl;
		}
		else
		{
			//echo "Failed ";
		}
		$lst = explode(",", $uid2);
		foreach($lst as $item) 
		{
			$rs1=mysql_query("INSERT INTO tempquestionid_checking(`TempDocID`,`Uniqid`,Qno,Topic_id,Checking_Done,Ready_forChecking,
			Mark_For_Deletion)VALUES('$max_id_get','$item','$count_cv','0','0','0','0')");
			if($rs1)
			{
				//echo $variabl;
			}
			else
			{
				//echo "Failed ";
			}
			$count_cv++;
		}
		
		$update_query=mysql_query("UPDATE tempquestionid_checking SET Ready_forChecking='1' WHERE TempDocID='$max_id_get'");
		
		if($update_query)
		{
			//echo "success";
		}
		else
		{
			//echo "failed";
		}
		
		$key = true;
		while($key)
		{
			$result32=mysql_query("select checking_done from tempquepaperdocid where id='$max_id_get' AND checking_done=1");
			
			$count=mysql_num_rows($result32);
			
			if( $count> 0) 
			{
				$key = false;
				
			}
		}
		//echo "out of while loop ";
		$result33=mysql_query("SELECT Checking_Done,Mark_For_Deletion,Uniqid FROM `tempquestionid_checking` WHERE TempDocID='$max_id_get' AND Mark_For_Deletion=1");
		$row33=mysql_num_rows($result33);
		//echo "count of marks of deletion : ".$row33."\n";
		if($row33>0)
		{
			$chk_uid=$uid;
			//$uid="";
			//echo "check uid : ".$chk_uid;
			$lst = explode(",", $chk_uid);
			while($row3=mysql_fetch_array($result33))
			{
				//echo "IN while";
				if($row33)
				{
					//echo "IN if";
					foreach($lst as $item) 
					{
						//echo "IN fore item :".$item."\n";
						$uniqid=$row3[2];
						//echo "Unique ID fore query for deletion : \n ".$uniqid;
						if($lst == $uniqid)
						{
							//echo "Unique ID is same ".$item."UN".$uniqid."\n";
							goto a;
						}
						else
						{
							if(preg_match("/$uniqid/", $uid))
							{
								//echo 'Match from this string '.$uniqid;
							}
							else
							{
								//echo 'No match found';
							}
							$ukid=str_replace($uniqid.",", "", $uid);
							$new_st_value=$st_value-1;
							//
							//echo "\nukid : ".$ukid;
						}
					}
					$result45=mysql_query("SELECT ob.UniqId,c.topic_id,t.name FROM onlinequestionbank ob,concept c,topic t WHERE ob.ConceptId=c.id  AND ob.UniqId='$uid' AND c.topic_id=t.id");
					$rw45 = mysql_num_rows($result45);
					echo "<table>";
					while($row45=mysql_fetch_array($result45))
					{
						echo "<tr>";
						echo "<td style='border:solid 1px;width:119px;'>".$new_st_value."</td>";
						echo "<td style='border:solid 1px;width:119px;'>".$ukid."</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				a:
			}
		}
		else
		{
			echo "kuck ";
		}
		/*$result1=mysql_query("SELECT MAX(Srno) FROM document_manager_refid");
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
		
		*/
		include_once '../conn_close.php';
?>