<?Php
	class Thumbnail
	{
				
		public static function Create( $image, $type )
		{			 
			$dir = "gallery/".$_GET["album"]."/";
			
			// Thumnail will save here
		   	$thumbdir = $dir.'thumb/';
			
			// Create thumb directory if not exists
			if( !file_exists($thumbdir) ) {
				@mkdir( $thumbdir, 0777 );
				@touch( $thumbdir."index.html" );
			}
			
			//getting the image dimensions
		  	list( $width, $height ) = getimagesize( $dir.$image ); 
							 
			//create image from the file type
			if($type=='image/gif') {
		   		$_myImage = imagecreatefromgif( $dir.$image ) or die("Error: Cannot find image!");
			}
			elseif($type=='image/png') {
				$_myImage = imagecreatefrompng( $dir.$image ) or die("Error: Cannot find image!");
			}
			else {
				$_myImage = imagecreatefromjpeg( $dir.$image ) or die("Error: Cannot find image!");
			}
			
			//find biggest length		
			if( $width > $height ) $biggestSide = $width;
			else $biggestSide = $height;
		
			//find the gap between width & height.
			if( $width>$height ) {
				$w = 100;
				$h = (int)(100*$height/$width);
				$ratio = (float) sprintf(".%f",$h);
			}
			else {
				$h = 100;
				$w = (int)(100*$width/$height);
				$ratio = (float) sprintf(".%f",$w);
			}
			
		   	//The crop size will be half that of the largest side 
		   	$var = $ratio;
		   	$cropPercent = (float) $var; // This will zoom in to 50% zoom (crop)
		   
		   	//Set crop hieght & width
		   	if($width == $height){
				$_cropWidth   = $width; 
				$_cropHeight  = $width; 
								 
								 
				//getting the top left coordinate
				$_x = 0;
				$_y = 0;
			}else{
			
				$_cropWidth   = $biggestSide*$cropPercent; 
				$_cropHeight  = $biggestSide*$cropPercent; 
								 
								 
				//getting the top left coordinate
				$_x = ($width - $_cropWidth)/2;
				$_y = ($height - $_cropHeight)/2;
			}			 
			
			// will create a 150 x 150 thumb				
		  	$thumbSize = 150; 
		  	
			$_thumb = imagecreatetruecolor( $thumbSize, $thumbSize ); 
		/*$transparent = imagecolorallocate($this->thumb,0,255,0);
			imagecolortransparent($this->thumb,$transparent);
			imagefilledrectangle($this->thumb,0,0,127,127,$transparent); */
		  	imagecopyresampled($_thumb, $_myImage, 0, 0,$_x, $_y, $thumbSize, $thumbSize, $_cropWidth, $_cropHeight); 
			
			if($type=='image/gif') {				 
			   	//header('Content-type: image/gif');
			   	imagegif( $_thumb, $thumbdir.$image );
			}
			elseif($type=='image/png') {
				//header('Content-type: image/png');
			   	imagepng( $_thumb, $thumbdir.$image );
			}
			else {
				//header('Content-type: image/jpeg');
			   	imagejpeg( $_thumb, $thumbdir.$image );
			}
			
			imagedestroy($_thumb); 
		}
		
		public static function SimpleThumb( $dir,$image, $type )
		{			 
			//$dir = "gallery/".$_GET["album"]."/";
			
			// Thumnail will save here
		   	//$thumbdir = $dir.'thumb/';
			
			//getting the image dimensions
		  	list( $width, $height ) = getimagesize( $dir.'/'.$image ); 
							 
			//create image from the file type
			if($type=='image/gif') {
		   		$_myImage = imagecreatefromgif( $dir.'/'.$image ) or die("Error: Cannot find image!");
			}
			elseif($type=='image/png') {
				$_myImage = imagecreatefrompng( $dir.'/'.$image ) or die("Error: Cannot find image!");
			}
			else {
				$_myImage = imagecreatefromjpeg( $dir.'/'.$image ) or die("Error: Cannot find image!");
			}
			
			//find biggest length		
			if( $width > $height ) $biggestSide = $width;
			else $biggestSide = $height;
		
			//find the gap between width & height.
			if( $width>$height ) {
				$w = 100;
				$h = (int)(100*$height/$width);
				$ratio = (float) sprintf(".%f",$h);
			}
			else {
				$h = 100;
				$w = (int)(100*$width/$height);
				$ratio = (float) sprintf(".%f",$w);
			}
			
		   	//The crop size will be half that of the largest side 
		   	$var = $ratio;
		   	$cropPercent = (float) $var; // This will zoom in to 50% zoom (crop)
		   
		   	//Set crop hieght & width
		   if($width == $height){
				$_cropWidth   = $width; 
				$_cropHeight  = $width; 
								 
								 
				//getting the top left coordinate
				$_x = 0;
				$_y = 0;
			}else{
			
				$_cropWidth   = $biggestSide*$cropPercent; 
				$_cropHeight  = $biggestSide*$cropPercent; 
								 
								 
				//getting the top left coordinate
				$_x = ($width - $_cropWidth)/2;
				$_y = ($height - $_cropHeight)/2;
			} 
			
			// will create a 150 x 150 thumb				
		  	$thumbSize = 100; 
		  	
			$_thumb = imagecreatetruecolor( $thumbSize, $thumbSize ); 
		/*$transparent = imagecolorallocate($this->thumb,0,255,0);
			imagecolortransparent($this->thumb,$transparent);
			imagefilledrectangle($this->thumb,0,0,127,127,$transparent); */
		  	imagecopyresampled($_thumb, $_myImage, 0, 0,$_x, $_y, $thumbSize, $thumbSize, $_cropWidth, $_cropHeight); 
			
			if($type=='image/gif') {				 
			   	//header('Content-type: image/gif');
			   	imagegif( $_thumb, $dir.'/thumb_'.$image );
			}
			elseif($type=='image/png') {
				//header('Content-type: image/png');
			   	imagepng( $_thumb, $dir.'/thumb_'.$image );
			}
			else {
				//header('Content-type: image/jpeg');
			   	imagejpeg( $_thumb, $dir.'/thumb_'.$image );
			}
			
			imagedestroy($_thumb); 
		}
		public static function VideoThumb( $dir,$image, $type, $dname )
		{			 
			//$dir = "gallery/".$_GET["album"]."/";
			
			// Thumnail will save here
		   	//$thumbdir = $dir.'thumb/';
			
			//getting the image dimensions
		  	list( $width, $height ) = getimagesize( $dir.'/'.$image ); 
							 
			//create image from the file type
			if($type=='image/gif') {
		   		$_myImage = imagecreatefromgif( $dir.'/'.$image ) or die("Error: Cannot find image!");
			}
			elseif($type=='image/png') {
				$_myImage = imagecreatefrompng( $dir.'/'.$image ) or die("Error: Cannot find image!");
			}
			else {
				$_myImage = imagecreatefromjpeg( $dir.'/'.$image ) or die("Error: Cannot find image!");
			}
			
			//find biggest length		
			if( $width > $height ) $biggestSide = $width;
			else $biggestSide = $height;
		
			//find the gap between width & height.
			if( $width>$height ) {
				$w = 100;
				$h = (int)(100*$height/$width);
				$ratio = (float) sprintf(".%f",$h);
			}
			else {
				$h = 100;
				$w = (int)(100*$width/$height);
				$ratio = (float) sprintf(".%f",$w);
			}
			
		   	//The crop size will be half that of the largest side 
		   	$var = $ratio;
		   	$cropPercent = (float) $var; // This will zoom in to 50% zoom (crop)
		   
		   	//Set crop hieght & width
		   if($width == $height){
				$_cropWidth   = $width; 
				$_cropHeight  = $width; 
								 
								 
				//getting the top left coordinate
				$_x = 0;
				$_y = 0;
			}else{
			
				$_cropWidth   = $biggestSide*$cropPercent; 
				$_cropHeight  = $biggestSide*$cropPercent; 
								 
								 
				//getting the top left coordinate
				$_x = ($width - $_cropWidth)/2;
				$_y = ($height - $_cropHeight)/2;
			} 
			
			// will create a 150 x 150 thumb				
		  	$thumbSize = 100; 
		  	
			$_thumb = imagecreatetruecolor( $thumbSize, $thumbSize ); 
		/*$transparent = imagecolorallocate($this->thumb,0,255,0);
			imagecolortransparent($this->thumb,$transparent);
			imagefilledrectangle($this->thumb,0,0,127,127,$transparent); */
		  	imagecopyresampled($_thumb, $_myImage, 0, 0,$_x, $_y, $thumbSize, $thumbSize, $_cropWidth, $_cropHeight); 
			
			if($type=='image/gif') {				 
			   	//header('Content-type: image/gif');
			   	imagegif( $_thumb, $dir.'/'.$dname );
			}
			elseif($type=='image/png') {
				//header('Content-type: image/png');
			   	imagepng( $_thumb, $dir.'/'.$dname );
			}
			else {
				//header('Content-type: image/jpeg');
			   	imagejpeg( $_thumb, $dir.'/'.$dname );
			}
			
			imagedestroy($_thumb); 
		}    
	}  
?>