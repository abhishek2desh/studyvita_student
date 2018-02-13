<?php 
	
	require_once("../config.php");
	
	
	$uid = $_GET['uid'];

			$today = date('Y-m-d');
	$result=mysql_query("SELECT d.id,d.path,d.materialname,s.name,b.name,sb.name,DATE_FORMAT(d.orderdate,'%d-%m-%y'),sm.schoolname FROM `document_manager_subjective_temp` d,board b,standard s,
`subject` sb,school_master sm WHERE d.documenttype='Schoolpaper' AND d.faculty='$uid'
 AND d.materialname NOT LIKE '%_Ans' AND s.id=d.standard AND b.id=d.board AND sb.id=d.subject AND sm.autoid=d.schoolid
  ORDER BY d.orderdate DESC");

	$rw = mysql_num_rows($result);
	if($rw==0)
	{
		echo "No Data Available";
	}
	else
	{
	echo "<table style='border:solid 1px;width:100%;'>";
	echo "<tr><th style='border:solid 1px;' width='2%'></th>";
							echo "<th style='border:solid 1px;' width='10%'>DocumentID</th>";
							echo "<th style='border:solid 1px;' width='10%'>Upload Date</th>";
							echo "<th style='border:solid 1px;' width='20%'>SchoolName </th>";
							echo "<th style='border:solid 1px;' width='10%'>Standard </th>";
							echo "<th style='border:solid 1px;' width='10%'>Board </th>";
							echo "<th style='border:solid 1px;' width='10%'>Subject </th>";
							echo "<th style='border:solid 1px;' width='28%'>Answersheet Status </th>";
							echo"</tr>";
	while($row=mysql_fetch_array($result))
	{
			//for find anspaper
		$ansfilename="";
		$ansfilename=$row[2]."_Ans";
		$ans_flg=0;
		$result3=mysql_query("SELECT srno FROM document_manager_subjective WHERE  materialname='$ansfilename'");
	$rw3 = mysql_num_rows($result3);
	if($rw3==0)
	{
	$ans_flg=0;
	}
	else
	{
	$ans_flg=1;
	}
		
		//end find anspaper
	
		echo "<tr>";
		echo "<td style='color:black;border:solid 1px;width:5px;'><center><input type='radio' name='name_ck' id='$row[0]' class='ck' value='$row[0]|$row[1]|$row[2]|$ans_flg' /></center></td>";
		echo "<td style='border:solid 1px;'>".$row[0]."</td>";
		echo "<td style='border:solid 1px;'>".$row[6]."</td>";
		echo "<td style='border:solid 1px;'>".$row[7]."</td>";
		echo "<td style='border:solid 1px;'>".$row[3]."</td>";
		echo "<td style='border:solid 1px;'>".$row[4]."</td>";
		echo "<td style='border:solid 1px;'>".$row[5]."</td>";
		if($ans_flg==1)
		{
		echo "<td style='border:solid 1px;'>Uploaded</td>";
		}
		else
		{
		echo "<td style='border:solid 1px;'>Upload pending</td>";
		}
		
			
			
			echo "</tr>";
	}
	echo "</table>";
	}
	
?>