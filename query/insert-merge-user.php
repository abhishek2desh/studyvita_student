<?php 
	include_once '../config.php';

	$user_list = $_GET['user_list'];
	$uid = $_GET['uid'];
	$user_list_new=",";
	$lst = explode(",", $user_list);
	foreach($lst as $item) 
	{
		if($item=="")
		{
		}
		else
		{
		$user_list_new=$user_list_new.$item.",";
		}
	}
	$rs1 = mysql_query("SELECT DISTINCT id FROM merge_account_student  WHERE user_id_list='$user_list_new' ");
	$rw = mysql_num_rows($rs1);
	if($rw==0)
	{
	$SQL = "INSERT INTO merge_account_student 
			(`user_id_list`,`created_by`) VALUES
			('$user_list_new','$uid')";
			//echo $SQL;
			$result1 = mysql_query($SQL);
			if ($result1)
			{
			echo "Success";
			}
			else
			{
			echo "failed";
			}
	}
	else
	{
	 echo "Already merge account";
	}
?>