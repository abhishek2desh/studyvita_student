<?php
	
		include_once '../config.php';
		session_start();
		
		$s2=$_SESSION['stnd1'];
		$board1 = $_SESSION['board'];
		$sb=$_GET['sub_id'];
		$s4=$_SESSION['btch1'];
		
		$result=mysql_query("SELECT id,NAME,ch_no FROM chapter WHERE sub_id IN 
						(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sb')
						AND board_id = '$board1'
						AND standard_id = '$s2'
						AND active=1");
		
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
			echo "<option value='0'>No Data Available.</option>";
		}
		else
		{
			echo "<option value=''>--Select Chapter--</option>";
			while($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[2]>($row[2])-$row[1] </option>";
			}
		}
		include_once '../conn_close.php';
?>