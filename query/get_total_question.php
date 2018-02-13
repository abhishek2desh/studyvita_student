
<?php
		include '../config.php';
	
		$crs_id=$_GET['crs_id'];
		$total_question=0;
		$result5=mysql_query("SELECT SUM(q.totalque) FROM `question_status_topicwise` q ,`course_chapter_module` ccm WHERE q.que_type='O' AND q.topic_id=ccm.module_name AND ccm.course_id='$crs_id' ");
		/*org$result5=mysql_query("SELECT COUNT(o.uniqid) FROM `onlinequestionbank` o ,concept c,`course_chapter_module` ccm 
WHERE o.documenttype='O' AND o.conceptid=c.id AND o.conceptid>0
AND c.topic_id=ccm.module_name AND ccm.course_id='$crs_id' AND o.Repeat_uniqid=FALSE AND o.pdffile_exist=TRUE");*/
		/*SELECT COUNT(DISTINCT mm.id) FROM media_manager mm,course_chapter cc WHERE 
 cc.course_id='195' AND (mm.chap_id=cc.chap_id  OR mm.chap_id IN(SELECT chapter_id FROM `chapter_mapping` WHERE
 chapter_id_mapping=cc.chap_id) OR  mm.chap_id IN(SELECT chapter_id_mapping  FROM `chapter_mapping` WHERE
 chapter_id=cc.chap_id) )*/
		while($row5=mysql_fetch_array($result5))
		{
			$total_question=$row5[0];
		}
		/*$result=mysql_query("SELECT board FROM course WHERE id='$crs_id'");
					while($row=mysql_fetch_array($result))
					{
					$board=$row[0];
					}
					
					if($board=='1')
					{
						
						$ud_count2=mysql_query("SELECT count(distinct ob.UniqId) FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t,`course_chapter_module` ccm
			WHERE m.Cbse_TopicId =ccm.module_name AND ccm.course_id='$crs_id' AND  m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
				AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND c.topic_id=t.id AND 
				(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O'  ");
						
						
					}
					elseif($board=='2')
					{
						$ud_count2=mysql_query("SELECT  count(distinct ob.UniqId) FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t,`course_chapter_module` ccm
			WHERE m.Gseb_TopicId=ccm.module_name AND ccm.course_id='$crs_id' AND  m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
				AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND c.topic_id=t.id AND 
				(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' ");
						
					
					}*/
					$ud_count2=mysql_query("SELECT SUM(q.mapped_que) FROM `question_status_topicwise` q ,`course_chapter_module` ccm WHERE q.que_type='O' AND q.topic_id=ccm.module_name AND ccm.course_id='$crs_id'");
					while($row2=mysql_fetch_array($ud_count2))
				{
				$total_question=$total_question+$row2[0];
				}
		//echo "<font face='verdana' size='4' color='white' >".$total_question."</font>";
		echo $total_question;
		
			
		
?>