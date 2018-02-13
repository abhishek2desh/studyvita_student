
<?php
		include '../config.php';
	
		$uid=$_GET['uid'];
	
	
		
			$result_ref=mysql_query("SELECT id,username,password,website_source,name FROM USER WHERE `id`='$uid'");
			$rw_ref=mysql_num_rows($result_ref);
			while($row = mysql_fetch_array($result_ref))
			{
			echo "$row[0]|$row[3]|$row[4]";
			}
		
?>