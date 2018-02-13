<?php

	include_once 'config.php';
	$result=mysql_query("SELECT DISTINCT test_id,student_id FROM `adaptive_learning_test` WHERE ((`correct_total_qus` IS NULL AND
`incorrect_total_qus` IS NULL AND `Unattempt_total_qus` IS NULL) OR (correct_total_qus=0 AND incorrect_total_qus=0 AND 
 Unattempt_total_qus=0)) AND Test_submit='1'");
while($row=mysql_fetch_array($result))
{
$result2=mysql_query("SELECT response,correct_ans FROM adaptive_test_response  WHERE test_id='$row[0]' AND student_id='$row[1]' ");

			$unattempt=0;
		$correct=0;
		$incorrect=0;
			while($row2=mysql_fetch_array($result2))
			{
			
			//echo "in while";
				$res=$row2[0];
				$corr_ans=$row2[1];
				
			
				if($res == $corr_ans)
				{
					$correct=$correct+1;
						
				}
				else if($res != $corr_ans)
				{
					if($res == 'x' || $res == "")
					{
						$unattempt=$unattempt+1;
					}
					else
					{
						$incorrect=$incorrect+1;
					}
				}
			}
			$update_query=mysql_query("UPDATE adaptive_learning_test SET correct_total_qus='$correct',incorrect_total_qus='$incorrect',Unattempt_total_qus='$unattempt' WHERE test_id='$row[0]' AND student_id='$row[1]'");
			if($update_query)
			{
			}
			else
			{
			echo "failed";
			}
}
echo "done";
?>