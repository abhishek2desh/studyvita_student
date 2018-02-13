<div id="add_school">
	<div  id="add_err"></div>
	<form action="" style="width:100%;">
		<table style="background-color:#0174DF;border:2px solid;width:100%;height:30px;">
			<tr>
				<td style='width:95%;'>
					<center><strong><label style="color:white">Add Institution</label></strong></center>
				</td>
				<td style='width:5%;'>
					<center><img src="images/close_image.png" id='cancel_hide_school' height="20px" width="25"></center>
				</td>
			</tr>
		</table>
		<table style="border:0px solid;width:100%;">
			<tr>
				<td valign="top" style="width:30%;">
					<strong><label style="color:black">Institution Name</label></strong>
				</td>
				<td valign="top" style="width:70%;">
					<input type="text" id='text_scname'/>
				</td>
			</tr>
				<tr>
				<td valign="top" style="width:30%;">
					<strong><label style="color:black">Institution Website</label></strong>
				</td>
				<td valign="top" style="width:70%;">
					<input type="text" id='text_website'/>
				</td>
			</tr>
			<tr>
				<td valign="top" style="width:30%;">
					<strong><label style="color:black">Country</label></strong>
				</td>
				<td valign="top" style="width:70%;">
				<select id="country_id" name="country_id" style="width:40%;">
									<?php
									$result=mysql_query("SELECT id,NAME FROM `country_detail` ORDER BY NAME");
									$rw = mysql_num_rows($result);
				echo "<option value='0'>Select Country</option>";

		if($rw == 0)
		{
		
			echo "<option value='0'>No Data Available.</option>";
		}
		else
		{
		while($row=mysql_fetch_array($result))
			{
			echo "<option value=$row[0]>$row[1]</option>";
			}
		}
									?>
									</select>
				</td>
			</tr>
			<tr>
				<td valign="top" style="width:30%;">
					<strong><label style="color:black">State</label></strong>
				</td>
				<td valign="top" style="width:70%;">
				<!--<select id="state_id" name="state_id" style="width:40%;">
				<option value=''>Select State</option>
				</select>-->
					<input type="text" id='text_state'/>
				</td>
			</tr>
			<tr class="pincode_dt">
				<td valign="top" style="width:30%;">
					<strong><label style="color:black">Pincode</label></strong>
				</td>
				<td valign="top" style="width:70%;"><input type="text" class="inputs" id="pincode" ><font color="red">*</font>
				<label style="font-size:14px;color:black;" class="pinclass">Search Pincode</label><input type="text" class="inputs" id="areaid" placeholder="Enter Area/District/State" />
										<input type="button" id="search_pin" value='Search'  class="defaultbutton"/><br/>
											<div  id="pincode_data"   style='width:100%;height:200px;border:solid 0px;overflow-y: scroll;'></div><br/>
										<div id='hide_result' style="border:solid 0px;width:100%;height:100px;">
							&nbsp;&nbsp;<img src='loading/di_load.gif' >
						</div>
				</td>
			</tr>
			<tr>
				<td valign="top" style="width:30%;">
					
				</td>
				<td valign="top" style="width:70%;">
					<input type="BUTTON" id='btn_school' value="Submit" height="20px" width="25" class="defaultbutton"/>
				</td>
			</tr>
		</table>
		
	</form>
</div>