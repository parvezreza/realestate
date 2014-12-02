// JavaScript Document
/***************** Ajax function for check database existings ************************/
		function ajaxExistings(dbtable,data)
		{
			var url = "../actions/ajaxExistings.php?dbtable="+dbtable+"&data="+data;
			/*if (str=="")
		  	{
			  	document.getElementById("txtid").innerHTML="";
			  	return;
		  	} */
			if (window.XMLHttpRequest)
		  	{// code for IE7+, Firefox, Chrome, Opera, Safari
		  		xmlhttp=new XMLHttpRequest();
		  	}
			else
		  	{// code for IE6, IE5
		 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  	}
			xmlhttp.onreadystatechange=function()
		  	{
		  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					///document.getElementById("ajaxHint").innerHTML=xmlhttp.responseText;
					//var hint = xmlhttp.responseText;
					alert(xmlhttp.responseText);
				}
		  	}
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
		}
/*****************************************************************************************/


(function( $ ){
		
  	$.fn.inputValidation = function( options ) {
  		
		var settings = $.extend( {
			  'ajax'         : null
    		}, options);


		
		this.bind("blur",function()
		{
			if($(this).val().length<4)
			{
				$(this).next("span").removeClass();
				$(this).next("span").addClass("input-notation-error").html('Field is currently empty or short!');
			}
			else
			{
				if(settings.ajax !=null)
				{
					//ajaxExistings('article','home');
					
					/*if(ajaxHint=='error')
						$(this).next("span").addClass("input-notation-error").html('Article title is not available! Please change new one.');
					else */
						//alert('Success'); 
				
				}
			}
		});
		
		this.bind("keypress",function(e)
		{
			if(e.which==13)
				e.preventDefault();

			$(this).next("span").removeClass().html('');
		});
		
	/******* Plugin Methodes **************************************************/
		
		
  	};
})( jQuery );

