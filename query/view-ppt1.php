<?php 
$val2=$_GET['material'];
$val2= $val2.".ppt";
$path1 = "\\\ALNITEC-73N4CS8\\Tempquestions\\Private_Documents".$val2;
/*echo "<div style='border:solid 1px;width:100%; height:530px;'>";
	$val3="http://view.officeapps.live.com/op/view.aspx?src=".$path1;
	$val=$val3; 
	echo "<iframe src=$val width='100%' height='530' frameborder=2></iframe>";
echo "</div>";*/

echo "<div style='border:solid 1px;width:100%; height:530px;'>";
	$val3="http://view.officeapps.live.com/op/view.aspx?src=https://studyvita.com/ppt/".$val2;
	$val=$val3; 
	echo "<iframe src=$val width='100%' height='530' frameborder=2></iframe>";
echo "</div>";

?>
