<?php
	include '../config.php';
	$fact_id=$_GET['fact_id'];
	$fname="";
	$photopath="";
	$qual="";
	$exp="";
	$desc="";
	
	$result=mysql_query("SELECT name,student_photos from `user` where id='$fact_id'");
	//echo "SELECT name,student_photo from `user` where id='$fact_id'";
	while($row=mysql_fetch_array($result))
	{
	$fname=$row[0];
	$photopath=$row[1];
	}
	$result=mysql_query("SELECT Qualification,experience,brief_note from faculty_detail where user_id='$fact_id'");
	while($row=mysql_fetch_array($result))
	{
	$qual=$row[0];
	$exp=$row[1];
	$desc=$row[2];
	}
	echo "<table style='border:solid 0px;width:100%;' cellspacing='0'>";
	echo "<tr>";
	echo "<td style='border:solid 1px;width:20%;' valign='top'>";
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
	echo "<td style='border-top:solid 1px;border-bottom:solid 1px;border-left:solid 0px;border-right:solid 1px;width:80%;padding-left:10px;' valign='top'>";
	echo "<font color='#1b4268' size='3'>";

	echo "Name: ".$fname."<br/><br/>";
	echo "Qualification: ".$qual."<br/><br/>";
	echo "Experience: ".$exp."<br/><br/>";
	echo "</font>";
	echo "</td>";
	echo "</tr>";
	if($desc=="")
	{
	}
	else
	{
	echo "<tr>";
	echo "<td style='border-left:solid 1px;border-right:solid 1px;border-bottom:solid 1px;border-top:solid 0px;padding-top:5px;padding-left:5px;padding-right:5px;padding-bottom:5px;' valign='top' colspan='2'>";
	echo "<font color='#1b4268' size='3'>";
	echo $desc;
	echo "</font>";
	echo "</td>";
	echo "</tr>";
	}
	echo "</table>";
?>