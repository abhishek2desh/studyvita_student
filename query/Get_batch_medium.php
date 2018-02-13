<?php
		include '../config.php';
		
		$stu_batch_id=$_GET['stu_batch_id'];
		$medium="";
		$result_u=mysql_query("SELECT medium FROM batch WHERE id='$stu_batch_id'  and medium is not NULL");
			
			while($rowu=mysql_fetch_array($result_u))
			{
				 $medium=$rowu[0];
			}
			if($medium=="")
			{
			$medium="English";
			}
			echo $medium;
		
			
		
		
?>