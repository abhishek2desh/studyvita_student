if($val_for_saas==1)
						{
						$sql_in="SELECT DISTINCT ml.`useful_link`,ml.`hyper_link`,ml.id FROM menubar_list ml,saas_module_userwise um,saas_module_menu sm WHERE ml.id=sm.menu_id AND define_user='faculty' AND ml.active='1' AND um.user_id='$login_session_id' AND sm.saas_id=um.saas_module_id ORDER BY ml.priority ";
						}
						else
						{
	if($val_for_saas==1)
						{
						$sql_sub="SELECT DISTINCT ml.`useful_link`,ml.`hyper_link`,ml.id,sm.menu_id FROM submenubar_list ml,saas_module_userwise um,saas_module_menu sm
 WHERE ml.id=sm.submenu_id AND ml.active='1' AND um.user_id='$login_session_id' 
 AND sm.saas_id=um.saas_module_id AND sm.menu_id='$row_in[2]' ORDER BY ml.priority ";
						}
						else
						{					
						
						if($val_for_saas==1)
						{
						$login_expdate=$row_sub[4];
						$datetoday=date('Y-m-d');
						if(strtotime($datetoday)>strtotime($login_expdate))
						{
						echo"<tr><td>Menu Expired</td>";
						goto labelexit;
						}
						
						}