<?php
	require_once( 'include/mzfilemanager.php' );
	Logger::CheckLogin( $hDB );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>MZ File Browser</title>
    <link rel="stylesheet" href="styles/styles.css" type="text/css" />
    <link rel="stylesheet" href="styles/media.css" type="text/css" />
    <link rel="stylesheet" href="ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript">
		
		function getUrlVars() {
			var vars = {};
			var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
				vars[key] = value;
			});
			return vars;
		}
		
		var elem = getUrlVars()["elem"];
		
		
		function getUrlParam(paramName)
		{
			var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
			var match = window.location.search.match(reParam) ;
		 
			return (match && match.length > 1) ? match[1] : '' ;
		}
		
		jQuery (document).ready( function() {
			jQuery("a#browser").click(function(e) {
				e.preventDefault();
				if( typeof(elem) !== 'undefined' ){
					window.opener.document.getElementById(elem).src = $(this).attr("href");
					window.close();
				}
				else {
					var getFunction = getUrlParam('CKEditorFuncNum');
					var fileUrl = 'http://localhost/noboudoy/admin/' + $(this).attr("href");
					window.opener.CKEDITOR.tools.callFunction(getFunction,fileUrl);
					window.close();
				}
			});
		});
	</script>
</head>

<body>
	<?php
		
		FManager::getFiles( );
		
	?>
</body>
</html>