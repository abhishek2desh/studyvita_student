<?php 
	
	require_once("../config.php");
	
	$batch_id = $_GET['batch_id'];
	$uid = $_GET['uid'];
	$subject_id = $_GET['subject_id'];
			$today = date('Y-m-d');
	$result=mysql_query("SELECT DISTINCT q.name,DATE_FORMAT(test_date,'%d/%m/%Y') AS test_date,sub.name
	FROM test_announce ta,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id AND user_id='$uid' AND  ta.sub_id<>'20' and ta.exam_type='30'   and ta.sub_id='$subject_id' and ta.batch_id='$batch_id' and ta.test_date<='$today' ORDER BY ta.test_date DESC");
	$rw = mysql_num_rows($result);
	if($rw==0)
	{
		echo "No Data Available";
	}
	else
	{
	echo "<table style='border:solid 1px;width:100%;'>";
	echo "<tr><th style='border:solid 1px;' width='10'></th>";
							echo "<th style='border:solid 1px;' width='70'>TestID</th>";
							echo "<th style='border:solid 1px;' width='70'>TestDate</th>";
								echo "<th style='border:solid 1px;' width='70'>Answersheet Status</th></tr>";
	while($row=mysql_fetch_array($result))
	{
			//for find paper
		$qfilename="";
		
		$result3=mysql_query("SELECT d.materialname FROM document_manager_subjective d,`documentid_testid_refer` dt WHERE dt.testid='$row[0]' AND d.srno=dt.documentid ");
		while($row3 = mysql_fetch_array($result3))
		{
			$qfilename=$row3[0]."_Qus";
			
		}
		//end find paper
		echo "<tr>";
		
		
			$result1=mysql_query("SELECT file_path,corrected,filename_new
	FROM student_upload_answersheet WHERE user_id='$uid' and test_id='$row[0]' order by id limit 1");
	$rw1 = mysql_num_rows($result1);
	
	if($rw1==0)
	{
	echo "<td style='color:black;border:solid 1px;width:5px;'><center><input type='radio' name='name_ck' id='$row[0]' class='ck' value='$row[0]|up||$qfilename' /></center></td>";
		echo "<td style='border:solid 1px;'>".$row[0]."</td>";
			echo "<td style='border:solid 1px;'>".$row[1]."</td>";
		echo "<td style='border:solid 1px;'>Upload pending</td>";
	}
	else
	{
			$corrected=0;
		$upload_filename="";
		$upload_filename_new="";
		while($row1 = mysql_fetch_array($result1))
		{
			$upload_filename=$row1[0];
			$corrected=$row1[1];
			$upload_filename_new=$row1[2];
		}
		if($corrected=="1")
		{
		$totalfile=0;
		$result1_cnt=mysql_query("SELECT file_path,corrected,filename_new
	FROM student_upload_answersheet WHERE user_id='$uid' and test_id='$row[0]' ");
	$rw1_cnt = mysql_num_rows($result1_cnt);
	$totalfile=$rw1_cnt;
		echo "<td style='color:black;border:solid 1px;width:5px;'><center><input type='radio' name='name_ck' id='$row[0]' class='ck' value='$row[0]|cd|$upload_filename_new|$qfilename|$totalfile' /></center></td>";
		echo "<td style='border:solid 1px;'>".$row[0]."</td>";
			echo "<td style='border:solid 1px;'>".$row[1]."</td>";
		echo "<td style='border:solid 1px;'>Corrected</td>";
		}
		else
		{
		echo "<td style='color:black;border:solid 1px;width:5px;'><center><input type='radio' name='name_ck' id='$row[0]' class='ck' value='$row[0]|cp||$qfilename' /></center></td>";
		echo "<td style='border:solid 1px;'>".$row[0]."</td>";
			echo "<td style='border:solid 1px;'>".$row[1]."</td>";
		echo "<td style='border:solid 1px;'>Correction pending</td>";
		}
	}
			
			echo "</tr>";
	}
	echo "</table>";
	}
	
?>