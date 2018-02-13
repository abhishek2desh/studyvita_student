<?php
	
		include_once '../config.php';
		$ch_link="";
		$chapter_id=$_GET['chapter_id'];
		$result_t=mysql_query("SELECT menu_web_link FROM `text_book_link_chapterwise` WHERE chapter_id='$chapter_id'");
		$rw_t=mysql_num_rows($result_t);
		if($rw_t>0)
		{
			
			while($row_t=mysql_fetch_array($result_t))
			{
			 $ch_link=$row_t[0];
			}
				
		}
		echo $ch_link;
?>