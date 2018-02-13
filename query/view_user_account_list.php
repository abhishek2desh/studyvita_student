<?php
include '../config.php';
	$accountlist=$_GET['accountlist'];
	//$course_id=$_GET['course_id'];
	$stid="";
	$name="";
	$email="";
	$contact="";
	$flg=0;
	echo "<table style='width:100%;' id='tableSelect1'>";
	echo "<tr><th style='border:solid 1px;' width='10'></th>";
	echo "<th style='border:solid 1px;' width='30'>User ID</th>";
	echo "<th style='border:solid 1px;' width='50'>Name</th>";
	echo "<th style='border:solid 1px;' width='50'>Email</th>";
	echo "<th style='border:solid 1px;' width='50'>Contact</th>";
	echo "<th style='border:solid 1px;' width='50'>User Name</th>";
	echo "<th style='border:solid 1px;' width='50'>Password</th>";
	echo "<th style='border:solid 1px;' width='50'>Course</th></tr>";
	$lst = explode(",", $accountlist);
	foreach($lst as $item) 
	{
		if($item=="")
		{
		}
		else
		{
			$rs = mysql_query("SELECT id,NAME,email,contact_no,username,password FROM USER WHERE id='$item'");
			while($row = mysql_fetch_array($rs))
			{
				$flg=1;
				echo "<tr id='$row[0]' onclick='selectRow(this)'>";
				echo "<td style='border:solid 1px'  valign='top'><center><input type='checkbox' name='name_sb[]' id='$row[0]' class='ck' value='$row[0]' /></center></td>";
				echo "<td style='border:solid 1px;' valign='top'>".$row[0]."</td>";
				echo "<td style='border:solid 1px;' valign='top'>".$row[1]."</td>";
				echo "<td style='border:solid 1px;' valign='top'>".$row[2]."</td>";
				echo "<td style='border:solid 1px;' valign='top'>".$row[3]."</td>";
				echo "<td style='border:solid 1px;' valign='top'>".$row[4]."</td>";
				echo "<td style='border:solid 1px;' valign='top'>".$row[5]."</td>";
				$course_list="";
				$rs1 = mysql_query("SELECT DISTINCT c.id,c.name FROM course c,`student_registered_course` st WHERE st.user_id='$item' AND c.id=st.course_id");
			while($row1 = mysql_fetch_array($rs1))
			{
			$course_list=$course_list.$row1[1];
			}
				echo "<td style='border:solid 1px;'>".$course_list."</td>";
				echo "</tr>";
			}
		}
	}
	if($flg==0)
	{
		echo "<tr>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'>No Data Available</td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "<td style='border:solid 1px;'></td>";
		echo "</tr>";
	}
	echo "</table>";
	/*$flg=0;
	
	$rs = mysql_query("SELECT distinct u.id,u.NAME,u.email,u.contact_no,u.username,u.password FROM USER u, user_roll ur WHERE  ur.user_id=u.id and ur.roll_id='5' and u.email ='$email' and u.contact_no ='$contact'");

	$rw = mysql_num_rows($rs);
	if($rw==0 || $rw==1)
	{
	 echo "No Data Available";
	}
	else
	{
		$org_course=0;
		echo "<table style='width:100%;' id='tableSelect1'>";
		echo "<tr><th style='border:solid 1px;' width='10'></th>";
		echo "<th style='border:solid 1px;' width='30'>User ID</th>";
		echo "<th style='border:solid 1px;' width='50'>Name</th>";
		echo "<th style='border:solid 1px;' width='50'>Email</th>";
		echo "<th style='border:solid 1px;' width='50'>Contact</th>";
		echo "<th style='border:solid 1px;' width='50'>User Name</th>";
		echo "<th style='border:solid 1px;' width='50'>Password</th></tr>";
		
		
		
		while($row = mysql_fetch_array($rs))
		{
			$rs1 = mysql_query("SELECT DISTINCT c.id,c.name FROM course c,`student_registered_course` st WHERE st.user_id='$row[0]' AND c.id=st.course_id");
			while($row1 = mysql_fetch_array($rs1))
			{
				echo "<tr id='$row[0]' onclick='selectRow(this)'>";
				echo "<td style='border:solid 1px'><center><input type='checkbox' name='name_sb[]' id='$row[0]' class='ck' value='$row[0]' /></center></td>";
				echo "<td style='border:solid 1px;'>".$row[0]."</td>";
				echo "<td style='border:solid 1px;'>".$row[1]."</td>";
				echo "<td style='border:solid 1px;'>".$row[2]."</td>";
				echo "<td style='border:solid 1px;'>".$row[3]."</td>";
				echo "<td style='border:solid 1px;'>".$row[4]."</td>";
				echo "<td style='border:solid 1px;'>".$row[5]."</td></tr>";
			}
		}
	}*/
	
	
?>