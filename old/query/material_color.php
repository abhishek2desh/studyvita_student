<?php

	$result1=mysql_query("SELECT DISTINCT om.id,om.material_id,m.material_name FROM omr_student_score_history om,material m WHERE om.material_id=m.id AND student_id='$s5' AND m.material_name='$row[2]'");
	$count=mysql_num_rows($result1);
	$result34 = substr($row[2] , 0 , 3);
	if($row[5] == "")
	{
		if($result34 == "GES")
		{
			if($count == '1')
			{
				echo "<option value='$row[0]-$row[2]' style='color:#FA58F4'><b>$count_mat. $row[2][$row[4]]</b></option>";
				$count_mat++;
			}
			else if($count >= '2')
			{
				echo "<option value='$row[0]-$row[2]' style='color:#2E2EFE'><b>$count_mat. $row[2][$row[4]]</b></option>";
				$count_mat++;
			}
			else
			{
				echo "<option value='$row[0]-$row[2]' style='color:#848484'><b>$count_mat. $row[2][$row[4]]</b></option>";
				$count_mat++;
			}
		}
		else
		{
			if($count == '1')
			{
				echo "<option value='$row[0]-$row[2]' style='color:#FA58F4'><b>$count_mat. [$count_mat]$row[3][$row[4]]</b></option>";
				$count_mat++;
			}
			else if($count >= '2')
			{
				echo "<option value='$row[0]-$row[2]' style='color:#2E2EFE'><b>$count_mat. $row[3][$row[4]]</b></option>";
				$count_mat++;
			}
			else
			{
				echo "<option value='$row[0]-$row[2]' style='color:#848484'><b>$count_mat. $row[3][$row[4]]</b></option>";
				$count_mat++;
			}
		}
	}
	else
	{
		if($result34 == "GES")
		{
			if($count == '1')
			{
				echo "<option value='$row[0]-$row[2]' style='color:#FA58F4'><b>$count_mat. $row[2][$row[5]]</b></option>";
				$count_mat++;
			}
			else if($count >= '2')
			{
				echo "<option value='$row[0]-$row[2]' style='color:#2E2EFE'><b>$count_mat. $row[2][$row[5]]</b></option>";
				$count_mat++;
			}
			else
			{
				echo "<option value='$row[0]-$row[2]' style='color:#848484'><b>$count_mat. $row[2][$row[5]]</b></option>";
				$count_mat++;
			}
		}
		else
		{
			if($count == '1')
			{
				echo "<option value='$row[0]-$row[2]' style='color:#FA58F4'><b>$count_mat. $row[3][$row[5]]</b></option>";
				$count_mat++;
			}
			else if($count >= '2')
			{
				echo "<option value='$row[0]-$row[2]' style='color:#2E2EFE'><b>$count_mat. $row[3][$row[5]]</b></option>";
				$count_mat++;
			}
			else
			{
				echo "<option value='$row[0]-$row[2]' style='color:#848484'><b>$count_mat. $row[3][$row[5]]</b></option>";
				$count_mat++;
			}
		}
	}

?>
