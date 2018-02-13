<?php
	include '../config.php';
	$user_id=$_GET['user_id'];
	$org_course=0;
	$i=1;
	$rs1 = mysql_query("SELECT DISTINCT id,user_id_list,created_by FROM merge_account_student  WHERE (user_id_list like '%,$user_id,%' or created_by='$user_id') ");
			while($row1 = mysql_fetch_array($rs1))
			{
				/*if($old_list=="")
				{
					$old_list=",".$row1[0].",";
				}
				else
				{
					$temp_id=",".$row1[0].",";	
					if (strpos($old_list,$temp_id) !== false)
					 {
						goto nextrec;
						
					 }
					 else
					 {
					 $old_list=$old_list.$row1[0].",";
					 }
				}*/
				if($org_course==0)
				{
				echo "<table style='width:100%'>";
				echo "<tr>";
				echo "<th style='border:solid 1px;' width='5%'>Srno </th>";
				echo "<th style='border:solid 1px;' width='85%'>User ID List </th><th style='border:solid 1px;' width='10%'>Created By </th></tr>";
				$org_course=1;
				}
				
				
				echo "<tr>";
				echo "<td style='border:solid 1px;'>".$i."</td>";
				echo "<td style='border:solid 1px;'>".$row1[1]."</td>";
				echo "<td style='border:solid 1px;'>".$row1[2]."</td>";
				echo "</tr>";
				$i++;
				
			}
			
			
			
	/*$course_id=$_GET['course_id'];
	$name="";
	$email="";
	$contact="";
	$rs = mysql_query("SELECT NAME,email,contact_no FROM USER WHERE id='$user_id'");
	while($row = mysql_fetch_array($rs))
	{
		$name=$row[0];
		$email=$row[1];
		$contact=$row[2];
	}
	$flg=0;
	$old_list="";
	$rs = mysql_query("SELECT distinct u.id,u.NAME,u.email,u.contact_no,u.username,u.password FROM USER u, user_roll ur WHERE  ur.user_id=u.id and ur.roll_id='5' and u.email ='$email' and u.contact_no ='$contact'");

	$rw = mysql_num_rows($rs);
	if($rw==0 || $rw==1)
	{
	 echo "No Data Available";
	}
	else
	{
		$org_course=0;
	
		
		
		$i=1;
		while($row = mysql_fetch_array($rs))
		{
		
			$rs1 = mysql_query("SELECT DISTINCT id,user_id_list FROM merge_account_student  WHERE user_id_list like '%,$row[0],%' ");
			while($row1 = mysql_fetch_array($rs1))
			{
				if($old_list=="")
				{
					$old_list=",".$row1[0].",";
				}
				else
				{
					$temp_id=",".$row1[0].",";	
					if (strpos($old_list,$temp_id) !== false)
					 {
						goto nextrec;
						
					 }
					 else
					 {
					 $old_list=$old_list.$row1[0].",";
					 }
				}
				if($org_course==0)
				{
				echo "<table style='width:100%'>";
				echo "<tr>";
				echo "<th style='border:solid 1px;' width='10'>Srno </th>";
				echo "<th style='border:solid 1px;' width='100'>User ID List </th></tr>";
				$org_course=1;
				}
				
				
				echo "<tr>";
				echo "<td style='border:solid 1px;'>".$i."</td>";
				echo "<td style='border:solid 1px;'>".$row1[1]."</td></tr>";
				$i++;
				nextrec:
			}
		}
		if($org_course==0)
		{
		 echo "No Data Available";
		}
	}*/
	
	
?>