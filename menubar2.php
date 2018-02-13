<?php 

	include_once 'config.php';
	$s4=$_SESSION['btch1'];
?>
<ul id="menu">
	<li><a href="test_paper_generator.php">Adaptive Learning</a></li>
	<li><a href="diagnostic_analysis.php">Unitwise Diagnostic Analysis</a></li>
	<li><a href="diagnostic_analysis_ch.php">Chapterwise Diagnostic Analysis</a></li>
	<li><a href="http://www.globaleduserver.com/Default.aspx">Free Video Lecture</a></li>
	<li><a href="viewtt.php">Time Table</a></li>
	<li><a href="http://www.globaleduserver.com/Default.aspx">Virtual Class</a></li>
	<li><a href="logout.php" id="task_check_out">Log Out</a></li>
	<li><a href="index.php" id="view_student_progress">Home</a></li>
	<li><a href="contact_support.php" id="view_student_progress">Support</a></li>
	<?php
	
	$res1=mysql_query('SELECT batch_id FROM allow_refer_friends');
	$row1=mysql_fetch_array($res1);
	$per1=$row1[0];
	if($per1 == $s4)
	{?>
		<li><a href="refer_to_friends.php" id="view_student_progress">Refer a Friend</a></li>
	<?php
		
	}
	else 
	{
	}
	?>
	<li><a href="contact_details.php">Contact Details</a></li>
	<li><a href="time_table_rate.php">Rate my Understanding</a></li>
</ul>
<?php
	
	$res=mysql_query('SELECT id,permission FROM copy_safe_permission');
	$row=mysql_fetch_array($res);
	$per=$row[1];
	if($per == "true")
	{
		include 'copysafe.php';
	}
	else
	{
		
	} 
	include 'conn_close.php';
?>