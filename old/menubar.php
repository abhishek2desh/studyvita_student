<?php 

	include_once 'config.php';
	$s4=$_SESSION['btch1'];
	
?>
<ul id="menu">
	<?php
	$result2=mysql_query("SELECT ml.useful_link,ml.hyper_link,ml.id FROM menubar_link ml,menubar_batch_write mbw WHERE ml.define_user='student' AND ml.active='1' 
AND ml.id=mbw.menubar_id AND mbw.batch_id='$s4'");
	while($row2=mysql_fetch_array($result2))
	{
		if($row2[2] == 23)
		{
			$res1=mysql_query("SELECT batch_id FROM allow_refer_friends");
			$row1=mysql_fetch_array($res1);
			$per1=$row1[0];
			if($per1 == $s4)
			{
				echo "<li><a href='$row2[1]'>$row2[0]</a></li>";
			}
		}
		else
		{
			echo "<li><a href='$row2[1]'>$row2[0]</a></li>";
		}
	}
	?>
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
?>