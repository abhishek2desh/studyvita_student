<?php
	
		include_once '../config.php';
		session_start();
		$s5=$_SESSION['sid'];
		$sub_id=$_GET['sub_id'];
		$course_id=$_GET['course_id'];
		$test_id=$_GET['test_id'];
		$board_id="";
		$std_id="";
		$result1=mysql_query("SELECT class,board FROM `course` WHERE id='$course_id' ");
		
			while($row1_ch=mysql_fetch_array($result1))
			{
				$std_id=$row1_ch[0];
				$board_id=$row1_ch[1];
			}
			
			$rs = mysql_query("SELECT  DISTINCT u.name,u.student_photos,fd.`experience`,fd.`Qualification`,fd.brief_note,u.id FROM `faculty_detail` fd,USER u,`faculty_subject_board_std_mapping` fm WHERE u.id=fd.user_id AND fm.user_id=fd.user_id AND fm.board_id='$board_id' AND fm.standard_id='$std_id' AND fm.subject_id='$sub_id'");
			$rw = mysql_num_rows($rs);

		if($rw == 0)
		{
			echo "No Data Available";
			
		}
		else
		{
		$i=0;
		$j=0;
			echo "<table style='border:solid 0px;width:100%;' cellspacing='0'>";
			while($row = mysql_fetch_array($rs))
			{
				$fname="";
				$photopath="";
				$qual="";
				$exp="";
				$desc="";
				$fname=$row[0];
				$photopath=$row[1];
				$qual=$row[3];
				$exp=$row[2];
				$desc=$row[4];
				echo "<tr>";
				if($i==0)
				{
				echo "<td style='border:solid 1px;width:20%;' valign='top'>";
				}
				else
				{
				echo "<td style='border-left:solid 1px;border-top:solid 0px;border-bottom:solid 1px;border-right:solid 1px;width:20%;' valign='top'>";
				$i++;
				}
				if($photopath=="")
				{
				$filename="../StudentPhotos/blank_user_icon2.png";
				}
				else
				{
				$filename="../StudentPhotos/".$photopath;
				}
				
				
				echo "<img src='$filename' style='width:12em;max-height:10em;'>";
				echo "</td>";
				if($j==0)
				{
				echo "<td style='border-top:solid 1px;border-bottom:solid 1px;border-left:solid 0px;border-right:solid 1px;width:80%;padding-left:10px;' valign='top'>";
				}
				else
				{
				echo "<td style='border-top:solid 0px;border-bottom:solid 1px;border-left:solid 0px;border-right:solid 1px;width:80%;padding-left:10px;' valign='top'>";
				$j++;
				}
				
				echo "<font color='#1b4268' size='3'>";
				echo "Name: ".$fname."<br/><br/>";
				echo "Qualification: ".$qual."<br/><br/>";
				echo "Experience: ".$exp."<br/><br/>";
				echo "Description: ".$desc;
				echo "</font>";
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
?>