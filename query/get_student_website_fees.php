
<?php
		include '../config.php';
	
		$uid=$_GET['uid'];
		$course_id=$_GET['course_id'];
	
		$strdata="";
			$fees=0;
			$result_ref=mysql_query("SELECT id,username,password,website_source,name FROM USER WHERE `id`='$uid'");
			$rw_ref=mysql_num_rows($result_ref);
			while($row = mysql_fetch_array($result_ref))
			{
			$strdata=$row[0]."|".$row[3]."|".$row[4]."|";
			}
			$result_ref1=mysql_query("SELECT `Premium_account_fees` FROM course WHERE id='$course_id'");
			$rw_ref1=mysql_num_rows($result_ref1);
			while($row1 = mysql_fetch_array($result_ref1))
			{
			$fees=$row1[0];
			}
			if($fees=="")
			{
			$fees=0;
			}
			$strdata=$strdata.$fees;
		echo $strdata;
?>