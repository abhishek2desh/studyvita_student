<?php

	include_once '../config.php';
	
	$user_id=$_GET['uid'];
	$mat_name=$_GET['mat_name'];
	//$mat_path="D:\\BOX Syn\\My Box Files\\Printpdf\\";
	$mat_path="D:/BOX Sync/My Box Files/Printpdf/";
	$datepickerVal3=$_GET['datepickerVal3'];
	$result1=mysql_query("SELECT MAX(PrintOrderNo) FROM print_manager");
	$row1=mysql_fetch_array($result1);
	$max_id_test=$row1[0]+1;
	
	//$check_query=mysql_query("SELECT MaterialId FROM print_manager WHERE MaterialId='$mat_name'");
	
	//$rw_count=mysql_num_rows($check_query);
	
	//echo $rw_count;
	
	//if($rw_count == 1)
	//{
		//echo '<script type="text/javascript">alert("Already Exists");</script>';
	/*}
	else
	{*/
		//pdf pages count code
	
		$mat_table=mysql_query("SELECT material_name FROM material WHERE id='$mat_name'");
		$mat_row=mysql_fetch_array($mat_table);
		$get_mat=$mat_row[0];
		$new_mat_name=$get_mat.".pdf";
		//$path =  "D:\\1234\\Dropbox\\Serverdocs\\Swf\\test_flexpaper_docs\\$m_n".$ext;
		$path = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
		$pdfname=$path.$new_mat_name;
		
		$pdftext = file_get_contents($pdfname);
		
		$num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
		
		$insert_test_announce=mysql_query("INSERT INTO print_manager(`PrintOrderNo`,`UserId`,`MaterialId`,`MaterialPath`,`noofpages`,`Create_date`)
						   VALUES('$max_id_test','$user_id','$mat_name','$mat_path','$num','$datepickerVal3')");
		
		//echo "INSERT INTO print_manager(`PrintOrderNo`,`UserId`,`MaterialId`,`MaterialPath`,`noofpages`,`Create_date`)
			//			   VALUES('$max_id_test','$user_id','$mat_name','$mat_path','$num','$datepickerVal3')";
		
		if($insert_test_announce)
		{
			echo "Print list updated successfully";
		}
		else
		{
			echo "Failed";
		}
		$ending_path="D:/BOX Sync/My Box Files/Printpdf/".$new_mat_name;
		if (count(glob($ending_path)) > 0) 
		{
			//echo "The file $filename exists";
		} 
		else 
		{
			//echo "The file $filename does not exist";
			copy("$pdfname","$ending_path");
		}
		
	/*}*/
	include_once '../conn_close.php';
?>