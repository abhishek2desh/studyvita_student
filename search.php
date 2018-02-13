<?php
	session_start();
	include_once 'config.php';
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script>
	var filename11="setPassword.php?sid=";
	
		function getContent(filename)
                    {
                        $.ajax({
                            url: filename,
                            type: 'GET',
                            dataType: 'html',
                            
                            success: function(data, textStatus, xhr) {
								//alert(data);
								$('#st').html(data);	

                            },
                        });
                    }

		$(document).ready(function(){

			$('#set').click(function(event)
                    {
						event.preventDefault();
						
						var text = prompt("Set your Password", "Enter Password");
						var text1 = prompt("Confirm Password", "Confirm Password");
						
						if(text==text1)
						{
							var txt=text;
							//alert(filename11+txt)
							getContent(filename11+txt);
							$('#set').hide();
						}
						else
						{
							
							alert("Plese Re-Enter your Password...")
							$('#set').show();
						}
						//getContent(filename11);
						
                    });
										
			});

</script>
<?php
	if(isset($_GET['dt']))
	{
		$stud_id = $_GET['dt'];
		$_SESSION['ssid']=$stud_id;
	//	mysql_pconnect("localhost","edutechviewer34","edutechviewer34");
	//	mysql_pconnect("localhost","root","");
	//	mysql_select_db("learning34");
		$result=mysql_query("Select * from student where edutech_student_id=".$_GET['dt']);
		while($rw=mysql_fetch_array($result))
		{
			?>
			<table width="150" border="0">
			<tr>
				<td align="left"> <?php echo "Student ID" ?> </td>
				<td align="left" id="id"> <?php echo $rw[0] ?> </td>

			<tr>
				<td align="left"> <?php echo "Name" ?> </td>
				<td align="left"> <?php echo $rw[2] ?> </td>
			</tr>
			<tr>
				<td align="left"> <?php echo "Standard" ?> </td>
				<td align="left"> <?php echo $rw[4] ?> </td>
			</tr>
			<tr>
				<td align="left"> <?php echo "Email" ?> </td>
				<td align="left"> <?php echo $rw[5] ?> </td>
			</tr>
			<tr>
				<td align="left"> <?php echo "Group ID" ?> </td>
				<td align="left"> <?php 

					$rslt=mysql_query("Select * from detail where id=".$rw[6]);
					while($rowd=mysql_fetch_array($rslt))
					{
							 echo $rowd['description'];
					}
				?> </td>
			</tr>
			<tr>
				<td align="left"> <?php echo "Batch ID" ?> </td>
				<td align="left"> <?php 
					$rsl=mysql_query("Select * from batch where id=".$rw[7]);
					while($rowb=mysql_fetch_assoc($rsl))
					{
						 echo $rowb['name'];
					}
				  ?>
						 </td>
			</tr>
			
			
			</table>
			<table>
			<tr>
			<td>
			<div id="st">
			</div>
			</td>
			</tr>
			<tr>
				<td>
				<input type="submit" id="set" name="Submit" value="Set Password" />
				</td>
				
			<tr>
			</table>
			<?php
			
		}
	}
	else
	{
		echo "Plese Inform Admin, Because your data not available in Database....";
	}
	include 'conn_close.php';
?>