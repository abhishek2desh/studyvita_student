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
		
		$no = 1;
		
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
			Mark_For_Deletion)VALUES('$max_id_get','$item','$no','0','0','0','0')");
			if($rs1)
			{
				//echo $variabl;
			}
			else
			{
				//echo "Failed ";
			}
			$no++;
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
		$result33=mysql_query("SELECT Checking_Done,Mark_For_Deletion,Uniqid FROM `tempquestionid_checking` WHERE TempDocID='$max_id_get' AND Mark_For_Deletion=1");
		$row33=mysql_num_rows($result33);
		if($row33>0)
		{
			$chk_uid=$uid;
			//echo "check uid : ".$chk_uid;
			$lst = explode(",", $chk_uid);
			while($row3=mysql_fetch_array($result33))
			{
				if($row33)
				{
					foreach($lst as $item) 
					{
						$uniqid=$row3[2];
						if($lst == $uniqid)
						{
							goto a;
						}
						else
						{
							if(preg_match("/$uniqid/", $uid))
							{
							}
							else
							{
							}
							$ukid=str_replace($uniqid.",", "", $uid);
							$new_st_value=$st_value-1;
							$uid="";
							$uid=$ukid;
						}
					}
					$result45=mysql_query("SELECT ob.UniqId,c.topic_id,t.name FROM onlinequestionbank ob,concept c,topic t WHERE ob.ConceptId=c.id  AND ob.UniqId='$uid' AND c.topic_id=t.id");
					$rw45 = mysql_num_rows($result45);
					echo "<table>";
					while($row45=mysql_fetch_array($result45))
					{
						echo "<tr>";
						echo "<td id='first_td_1' value='$new_st_value' style='border:solid 1px;width:119px;visibility: hidden;'>".$new_st_value."</td>";
						echo "<td id='first_td_2' value='$uid' style='border:solid 1px;width:119px;visibility: hidden;''>".$uid."</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				a:
			}
		}
		else
		{
			echo "Repeated Questions not found"; 
		}
		include_once '../conn_close.php';
?>