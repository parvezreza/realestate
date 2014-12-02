(function($) {
	$.fn.formCheck = function(options) {
		var defaults = {
			errorClass 	: "error",
			submit		: false
		};
		
		var option = jQuery.extend(defaults, options);
		
		return this.each( function() {
			var form = $(this);
			
			if( !form.is("form") ) return;
			
				var errorFlag = false;
				
				jQuery(":input[fv]", this).each( function(index, element) {
					var e = $(element);
					var attr = e.attr('fv');
					var fieldlen = attr.match(/\d+/g);
					
					//e.insertAfter('<span></span>');
					e.next('span').removeClass().html('');
					
					if( attr.indexOf('numbers') !== -1 && fieldlen !== null ) {
						if( e.val().length < fieldlen ) {
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Field length must be at least '+fieldlen+' character(s) long!');
						}
						else if( !/^\d+$/.test(e.val()) ) {
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Only numbers are allowed!');
						}
					}
					else if( attr.indexOf('numbers') !== -1 && fieldlen == null ) {
						if( e.val().length > 0 && !/^\d+$/.test(e.val()) )
						{
							errorFlag = true;
							e.addClass(option.errorClass);
						}
					}
					
					else if( attr.indexOf('fraction') !== -1 && fieldlen !== null ) {
						if( e.val().length < fieldlen ) {
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Field length must be at least '+fieldlen+' character(s) long!');
						}
						else if( !/^\d*\.?\d*$/.test(e.val()) ) {
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Only numbers/fractions are allowed!');
						}
					}
					
					else if( attr.indexOf('currency') !== -1 && fieldlen !== null )
					{
						 if( e.val().length < fieldlen || !/^\d*\.?\d*$/.test(e.val()) ){
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Currency value is not valid!');
						}
					}
					else if( attr.indexOf('email') !== -1 && fieldlen !== null ) {
						if( e.val().length < fieldlen || !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(e.val()) )
						{
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Email id is not valid!');
						}
					}
					else if( attr.indexOf('email') !== -1 && fieldlen == null ) {
						if( e.val().length > 0 && !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(e.val()) )
						{
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Email id is not valid!');
						}
					}
					else if( attr.indexOf('required') !== -1 && fieldlen !== null ) {
						if( e.val().length < fieldlen )
						{
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Field length must be at least '+fieldlen+' character(s) long!');
						}
					}
					else if( attr.indexOf('required') !== -1 && fieldlen == null ) {
						if( e.val().length == 0 )
						{
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Field is empty!');
						}
					}
					else if( attr.indexOf('char') !== -1 && fieldlen !== null ) {
						if( e.val().length < fieldlen )
						{
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('Field length must be at least '+fieldlen+' character(s) long!');
						}
						else if( !/^\s*[a-zA-Z0-9,\s]+\s*$/.test(e.val()) ) {
							errorFlag = true;
							e.next('span').addClass(option.errorClass).html('No special character allowed!');
						}
					}
					else if( attr.indexOf('char') !== -1 && fieldlen == null ) {
						if( e.val().length > 0 && !/^\s*[a-zA-Z0-9,\s]+\s*$/.test(e.val()) )
						{
							errorFlag = true;
							e.addClass(option.errorClass);
						}
					}
					
				});
				
				if( option.submit && !errorFlag ) { // If option.submit = true
					var edit = getUrlVars()["option"];
					if( typeof(edit) !== 'undefined' && edit == 'edit' )
					{
						if( confirm('Action will update this information! Do you want to proceed?') ) {
							form.submit();
						}
					}
					else {
						form.submit();
					}
				}
				
				return !errorFlag;
		});
	};
})(jQuery);

function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
	});
	return vars;
}