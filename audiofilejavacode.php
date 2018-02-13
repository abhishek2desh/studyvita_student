/*
				filename ="query/check_user_audio_display.php?user_id="+user_id+"&page_source="+page_source;
					
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="0")
						{
						
						document.getElementById("myP").className="toggle-button toggle-button-selected";
						$("#audiodiv").show();
						}
						else
						{
						
						document.getElementById("myP").className="toggle-button";
							
						$("#audiodiv").hide();
						}
						},
						});
						$(document).on('click', '.toggle-button', function() {
    $(this).toggleClass('toggle-button-selected'); 
	if(document.getElementById("myP").className=="toggle-button")
	{
		
		filename ="query/insert_user_audio_display.php?user_id="+user_id+"&page_source="+page_source+"&donotshow=1";
					//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							if(data == "Success")
							{
								//alert("Data inserted successfully");
							}
							else if(data == "Error")
							{
								//alert("Error while insert data");
							}
							else
							{
								//alert(data);
							}
						},
					});
	}
	else
	{
		
		filename ="query/insert_user_audio_display.php?user_id="+user_id+"&page_source="+page_source+"&donotshow=0";
					//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							if(data == "Success")
							{
								//alert("Data inserted successfully");
							}
							else if(data == "Error")
							{
								//alert("Error while insert data");
							}
							else
							{
								//alert(data);
							}
						},
					});
	}
	});
				*/