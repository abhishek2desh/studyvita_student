Sorry! You have already given this test

SELECT COUNT(o.uniqid) FROM `onlinequestionbank` o ,concept c,toipc t,chapter ch
WHERE o.documenttype='O' AND o.conceptid=c.id AND o.conceptid>0
AND c.topic_id=t.id AND t.chap_id=ch.id AND ch.standard_id='' AND ch.board_id='1' AND sub_id=''
 AND o.Repeat_uniqid=FALSE AND o.pdffile_exist=TRUE