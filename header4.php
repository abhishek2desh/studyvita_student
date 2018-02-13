<?php
	//include 'lock.php';
	include_once 'config.php';
	//include('lock.php');
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$board1 = $_SESSION['board'];
	$branch = $_SESSION['branch'];
	
	$result=mysql_query("SELECT NAME AS group_name FROM `group` WHERE id=".$s3);
	$result1=mysql_query("Select name as batch_name from batch where id=".$s4);
	$result2=mysql_query("SELECT NAME as standard_name FROM standard WHERE id=".$s2);
	
	$row=mysql_fetch_array($result);
	if($row)
	{
		$grp1 = $row['group_name'];
	}

	$row1=mysql_fetch_array($result1);
	if($row1)
	{
		$btch1 = $row1['batch_name'];
	}	
	$row2=mysql_fetch_array($result2);
	if($row2)
	{
		$std2 = $row2['standard_name'];
	}
	
?>
<table style="float:left;border:solid 0px;width:100%;height:95px;">
	<tr>
		<td style="float:left;border:solid 0px;width:100%;height:60px;">
					<?php include 'adlp.php';?>
		</td>
	</tr>
	<tr>
		<td style="float:left;border:solid 0px;width:100%;height:30px;">
			<?php include 'menubar34.php'; ?>
		</td>
	</tr>
</table>