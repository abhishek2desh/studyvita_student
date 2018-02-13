<?php 
	require_once("../config.php");
	$batch_id = $_GET['batch_id'];
	$uid = $_GET['uid'];
	$subject_id = $_GET['subject_id'];
	
	$result=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,DATE_FORMAT(cb.create_date,'%d-%m-%Y') FROM course_batch_material cb,document_manager_subjective dms WHERE cb.doc_id=dms.Srno AND  cb.batch_id='$batch_id' AND SUBJECT='$subject_id' and dms.documenttype='Assignment' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus'  order by cb.create_date ");
	$rw = mysql_num_rows($result);
	if($rw==0)
	{
		echo "No Data Available";
	}
	else
	{
	echo "<table style='border:solid 1px;width:100%;'>";
	echo "<tr><th style='border:solid 1px;' width='10'></th>";
							echo "<th style='border:solid 1px;' width='70'>Assignment ID</th>";
							echo "<th style='border:solid 1px;' width='70'>Date</th>";
								echo "<th style='border:solid 1px;' width='70'>Status</th></tr>";
	while($row=mysql_fetch_array($result))
	{
	$qfilename=$row[1];
	//
	echo "<tr>";
		
		
			$result1=mysql_query("SELECT file_path,corrected,filename_new
	FROM student_upload_assignment WHERE user_id='$uid' and material_id='$row[0]'   order by id limit 1");
	$rw1 = mysql_num_rows($result1);
	
	if($rw1==0)
	{
	echo "<td style='color:black;border:solid 1px;width:5px;'><center><input type='radio' name='name_ck' id='$row[0]' class='ck' value='$row[0]|up||$qfilename' /></center></td>";
		echo "<td style='border:solid 1px;'>".$row[0]."</td>";
			echo "<td style='border:solid 1px;'>".$row[7]."</td>";
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
			//$upload_type=$row1[3];
		}
		
		if($corrected=="1")
		{
		$totalfile=0;
		$result1_cnt=mysql_query("SELECT file_path,corrected,filename_new
	FROM student_upload_assignment WHERE user_id='$uid' and material_id='$row[0]' and upload_type!='jpg' ");
	$rw1_cnt = mysql_num_rows($result1_cnt);
	$totalfile=$rw1_cnt;
	$result2_cnt=mysql_query("SELECT distinct upload_type
	FROM student_upload_assignment WHERE user_id='$uid' and material_id='$row[0]' and upload_type!='jpg' ");
	while($row1_2 = mysql_fetch_array($result2_cnt))
		{
			$upload_type=$row1_2[0];
			}
		echo "<td style='color:black;border:solid 1px;width:5px;'><center><input type='radio' name='name_ck' id='$row[0]' class='ck' value='$row[0]|cd|$upload_filename_new|$qfilename|$totalfile|$upload_type' /></center></td>";
		echo "<td style='border:solid 1px;'>".$row[0]."</td>";
			echo "<td style='border:solid 1px;'>".$row[7]."</td>";
		echo "<td style='border:solid 1px;'>Corrected</td>";
		}
		else
		{
		echo "<td style='color:black;border:solid 1px;width:5px;'><center><input type='radio' name='name_ck' id='$row[0]' class='ck' value='$row[0]|cp||$qfilename' /></center></td>";
		echo "<td style='border:solid 1px;'>".$row[0]."</td>";
			echo "<td style='border:solid 1px;'>".$row[7]."</td>";
		echo "<td style='border:solid 1px;'>Correction pending</td>";
		}
	}
			
			echo "</tr>";
	//
	}
	echo "</table>";
	}
?>