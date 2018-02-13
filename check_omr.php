function Check_OMR_sheet_And_response(material_id_get,tab,material_name)
{
//	setTimeout(function(){
//	}, 2000);

		alert("Load OMR Sheet or Result");
		
		if(ck_omr == "Insert_Data")
		{
			$("#Show_OMR_Div").hide();
			$("#OMR_result").hide();
			$(".sub_tr1").show();
			$(".sub_tr2").hide();
			$(".sub_tr3").hide();
			filename = "query/OMR_Sheet_Fill.php?material_id="+material_id_get;
			//alert(filename);
			getContent(filename,"dv");
		}
		else
		{	
			//  data_available
			$("#Show_OMR_Div").hide();
			$("#OMR_result").show();
			
			$("#re_test_score").show();
			
			filename = "query/omr_result_check.php?material_id="+material_id_get;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					var strtemp = $('#OMR_result_declare').html(data);
					
					eval(strtemp);
				}
				
			});
			subjective_sol(material_id_get);
		}
}
function Check_OMR_sheet_And_response2(material_id_get,tab,material_name)
{
//	setTimeout(function(){
//	}, 2000);
	
		alert("Load OMR Sheet or Result");
	
		if(ck_omr == "Insert_Data")
		{
			$("#Show_OMR_Div").hide();
			$("#OMR_result").hide();
			$(".sub_tr1").show();
			$(".sub_tr2").hide();
			$(".sub_tr3").hide();
			filename = "query/OMR_Sheet_Fill.php?material_id="+material_id_get;
			//alert(filename);
			getContent(filename,"dv");
		}
		else
		{	
			//  data_available
			$("#Show_OMR_Div").hide();
			$("#OMR_result").show();
			$("#given_test_id").hide();
			$("#re_test_score").show();
			
			filename = "query/omr_result_check.php?material_id="+material_id_get;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					var strtemp = $('#OMR_result_declare').html(data);
					
					eval(strtemp);
				}
				
			});
			subjective_sol(material_id_get);
		}
}