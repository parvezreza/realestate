// JavaScript Document
			var selcount = 0;
			
			$("#mod-delete").hide();
			
			$("a#mnu-delete").click(function(e) {
				e.preventDefault();
				// Atleast one or more checkbox is selected
				if(selcount>0) 
				{
					//$("#trashform").attr("action","trashbin.php?option=restore");
					
					$("#mod-delete").show(1,function(){
						$("#mod-delete p.notification").prepend(selcount);
						$("#mod-main").hide();
					});
				} // **
			});
			
			$("a#ico-delete").click(function(e) {
				e.preventDefault();
				// Triger for checkbox select
				var id = $(this).attr("href");
				$("input[value='"+id+"']").attr("checked","checked");
				selcount++;
				$("a#mnu-delete").click(); // Triger
			});
			
			$("a#delete").click(function(e) {
				e.preventDefault();
				$("#DataForm").submit();
			});
			
			$("input[value='Cancel']").click(function() {
				window.history.back();
			});
			
			/*****		Check all checkbox		********/
			$(":checkbox#ckall").click(function() {
				var $this = $(this);
				if ($this.is(':checked')) {
					$("input#ckbox").attr("checked","checked");
					selcount = $("input#ckbox").length;
				} else {
					$("input#ckbox").removeAttr("checked");
					selcount = 0;
				}
			});
			
			/******		Check one by one checkbox	******/
			$("input#ckbox").click(function() {
				var $this = $(this);
				if ($this.is(':checked')) {
					$(this).attr("checked","checked");
					selcount++;
				} else {
					$(this).removeAttr("checked");
					selcount--;
				}
			});
			
			/******		Form validation			***/
			$("input[name='title']").blur( function() {
				if( $(this).val().length < 4 )
					$(this).next('span').removeClass().addClass('input-notation-error').html('Title is empty or too short!');
				else
					$(this).next('span').removeClass().addClass('input-notation-correct').html('');
			});
			
			$("input[name='alias']").blur( function() {
				if( $(this).val().length < 4 )
					$(this).next('span').removeClass().addClass('input-notation-error').html('Title is empty or too short!');
				else
					$(this).next('span').removeClass().addClass('input-notation-correct').html('');
			});
			
			jQuery ( "input[type='text']" ).keypress( function() {
				$(this).next('span').removeClass().html('');
			});
			
			jQuery ("input#btnSubmit").click( function() {
				if( $("input[name='title']").val().length > 3 && $("input[name='alias']").val().length > 3 )
					jQuery ("#DataForm").submit();
			});
			
			$("input[value='Cancel']").click( function() {
				window.history.back();
			});