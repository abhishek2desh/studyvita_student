 <div id="course_id_resource" style="height:100px;overflow-y:scroll;padding-top:0px;width:96%;border:solid 1px;">
                                                <div class="col-md-12" style="width:100%;padding:0px;">
												<?php
												  $result = mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name,str.expire_date,DATE_FORMAT(str.expire_date,'%d-%m-%Y') 
											FROM student_registered_course str,course c,USER u,course_type_mapping ctm WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$s5' and str.status=1 and ctm.course_id=c.id and ctm.course_type_id='8'");
											$j=1;
											  echo "<table  id='tableSelect1' style='width:100%;'>";
                                                    echo "<tr><th style='border:solid 1px;' width='3%'></th>";

                                                    echo "<th style='border:solid 1px;' width='47%'><font color='black'>E-Books/E-Worksheets</font></th>";
                                                    echo "<th style='border:solid 1px;' width='30%'><font color='black'>Institution/Instructor/Publisher</font></th>";
													                                                    echo "<th style='border:solid 1px;' width='20%'><font color='black'>Valid upto</font></th>";
													echo"</tr>";
													$rw1=mysql_num_rows($result);
													if ($rw1 == 0)
													{
                                                          
                                                            echo "<tr><td style='border:solid 1px;'>
														</td>
														<td style='border:solid 1px;'>
														<font color='black'>No Data Available</font></td><td style='border:solid 1px;'>
														</td>
														<td style='border:solid 1px;'>
														</td></tr>";
                                                        } 
														else
														{
														while($row1=mysql_fetch_array($result))
														{
														 if($j%2 == 0)
																{
																echo "<tr style='background-color:white;'>";
																}
																else
																{
																echo "<tr style='background-color:#5E9DC8;'>";
																}
                                                                    echo "<td style='border:solid 1px;'><input type='radio'  name='stype' id='$row1[0]|$row1[1]'  value='$row1[0]' /></td>";
                                                                    echo "<td style='border:solid 1px;'><font color='black'>" . $row1[1] . "</font></td>";
																	  echo "<td style='border:solid 1px;'><font color='black'>" . $row1[3] . "</font></td>";
																	   echo "<td style='border:solid 1px;'><font color='black'>" . $row1[5] . "</font></td>";
																	echo "</tr>";
																	$j++;
														}
														}
														echo "</table>";

											?>
                                                   