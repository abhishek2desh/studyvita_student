<?php
require_once("../config.php");
$result=mysql_query("SELECT distinct AutoID,schoolname,pincode,Address,state,country_id FROM school_master    ORDER BY schoolname");
										$rw = mysql_num_rows($result);
											echo "<table  id='tableSelect' style='width:100%;' >";
                                                    echo "<tr><th style='border:solid 1px;' width='100%'>Select Institution</th></tr>";
										//echo "<option  value='0'>Select Institution</option>";
										if($rw == 0)
										{
											 echo "<tr><td style='border:solid 1px;' width='100%'>No Data Available</td></tr>";
										}
										else
										{
										$j=1;
											while($row=mysql_fetch_array($result))
											{
												if($j%2 == 0)
			{
			echo "<tr style='background-color:white;'>";
			}
			else
			{
			echo "<tr style='background-color:#5E9DC8;'>";
			}
			$school_details="";
			//$result=mysql_query("SELECT distinct AutoID,schoolname,pincode,Address,state,country_id FROM school_master  where  ORDER BY schoolname");
			if($row[2]=="")
			{
			if($row[3]=="" && $row[4]=="")
			{
			}
			else
			{
			$school_details=$row[3]."<br/>".$row[4]."<br/>".$row[2];
			}
			
			}
			else
			{
			$result5=mysql_query("SELECT office_name,`district_name`,`state_name` FROM `pincode` WHERE pincode='$row[2]'");
			$rw5 = mysql_num_rows($result5);
			if($rw5==0)
			{
			if($row[3]=="" && $row[4]=="")
			{
			}
			else
			{
			$school_details=$row[3]."<br/>".$row[4]."<br/>".$row[2];
			}
			
			}
			else
			{
				while($row5=mysql_fetch_array($result5))
				{
					$school_details=$row1[0]."<br/>".$row[3]."<br/>".$row5[1]."<br/>".$row5[2]."<br/>".$row[2];
				}
			}
			}
			if($school_details=="")
			{
				echo "<td style='color:black;border:solid 1px;width:100%;' ><a href='#'><input type='radio' name='name_sch' id='$row[0]' value='$row[0]' />".$row[1]."</a></td>";	
			}
			else
			{
			//echo "<td style='color:black;border:solid 1px;' height='30'><a href='#'><input type='checkbox' name='name_sb[]' id='$row1[0]' class='ck' value='$row1[0]' />".$row1[1]."<span class='tooltip'>".$row1[2]."</span></a></td>";
				echo "<td style='color:black;border:solid 1px;width:100%;' ><a href='#'><input type='radio' name='name_sch' id='$row[0]' value='$row[0]' />".$row[1]."<span class='tooltip'>".$school_details."</span></a></td>";	
			}
		
									
											echo "</tr>";
											$j++;
											}
										}
										echo "</table>";
?>