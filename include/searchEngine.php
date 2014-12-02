<?php
	
	final class searchEngine
	{	
		private $validFiles=array();
		private $fileArray=array();
		var $searchValue=array();
		
	//--- ---// Read directory and find all files ---- ///
		
		private function ListFiles($dir) {
		
			if($dh = @opendir($dir)) 
			{
				$files=array();
				$inner_files = array();
		
				while($file = readdir($dh)) 
				{
					if($file != "." && $file != ".." && $file[0] != '.') 
					{
						if(is_dir($dir . "/" . $file))
						{
							$inner_files = $this->ListFiles($dir . "/" . $file); //call recursive function
							if(is_array($inner_files)) $files = array_merge($files, $inner_files);
						} 
						else 
						{
							array_push($files, $dir . "/" . $file);
						}
					}
				}
		
				closedir($dh);
				return $files;
			}
		}
	
	/* //---	---		get all searchable files ----	--	// */
	
		private function getFiles($directory)
		{
			foreach ($this->ListFiles($directory) as $key=>$file) // call ListFiles() function
			{
				if(substr($file,-4)==".php" || substr($file,-4)=="html")
				{
					$this->checkFiles($file);
				}
			}  
		} 
		
	/* //--- ---------- check vaild files -------------   ----// */	
		
		private function checkFiles($filename)
		{
			$html=file_get_contents($filename);
			$doc=new DOMDocument(); // xml dom API
			@$doc->loadHTML($html);
			$tags=$doc->getElementsByTagName('wg');
			
			foreach($tags as $tag) // get all elements in a array
			{
				$key=$tag->getAttribute('key');
				$des=$tag->getAttribute('des');
				$this->findTag($filename,$key,$des); // call find tag function
			}
		}
		
	/* //--- ----------- find search tag from each files ---- ----- // */	
	
		private function findTag($file,$tagkey,$tagdes)
		{
			if(!empty($tagkey) && !empty($tagdes))
			{
				$this->validFiles[$file]=$file;
				
				$this->fileArray[$file] = array(	'file' => $file,
													'key'  => $tagkey,
													'des'  => $tagdes
												); // set values in public $fileArray array variable
			}
		}
					
	//-----------------//--    Finally search function    -----// ----------------//
		
		public function __construct($directory,$searchstr)
		{
			$this->getFiles($directory); // Before seraching include all searhable files
			
			foreach($this->validFiles as $files)
			{
				$getcontents=file_get_contents($files);
				
				$contents=strtolower(strip_tags($getcontents,'<wg>'));
				$findstr=explode(' ',strtolower($searchstr));
				
				
					foreach($findstr as $findstring)
					{
						$findpos=@strpos($contents,$findstring);
						if($findpos!==false) break; // found any word of findstring then search next files
					}

				if($findpos!==false)
				{

					$dom=new DOMDocument();
					$dom->preserveWhiteSpace=false;
					$dom->validateOnParse=true;
					@$dom->loadHTML($getcontents);

					$caption=$this->fileArray[$files]['key']; // search title: from Array

					/*$body=$dom->getElementsByTagName('body');
					foreach($body as $tag)
					{
						$des=$tag->nodeValue;
					}

					if(empty($des)) $des=$getcontents;
	
					//-----		strip script		-------------//
						$scripttag=$dom->getElementsByTagName('script');
						foreach($scripttag as $script)
						{
							$substr=$script->nodeValue;
							$des=str_replace($substr,'',$des);
						}
					
					//-----		strip style			-------------//
						$styletag=$dom->getElementsByTagName('style');
						foreach($styletag as $style)
						{
							$substr=$style->nodeValue;
							$des=str_replace($substr,'',$des);
						}
					
					//------	strip select element	----------//
						$selecttag=$dom->getElementsByTagName('select');
						foreach($selecttag as $select)
						{
							$substr=$select->nodeValue;
							$des=str_replace($substr,'',$des);
						}
					//----------------------------------------------------------*/
						
					//$description=substr(strip_tags($des,'<wg>'),0,300);
					
					$description=$this->fileArray[$files]['des'];
					
				// stroe found data in a array
					$this->searchValue[]= array(	'caption' 	=> $caption,
													'page'		=> $files,
													'descript'	=> $description."..."
										 		);
				///--		/---	/---	/---	/---		/---------------
				}
				
			}
					
		}
	} // end of class

//------- object instance ---------------------------		
	class WgEngine
	{
		private $getid,$Sstring;
		public $pages;
		
		public function __construct($string,$dir=NULL,$size=4)
		{
			if($dir==NULL) $dir=$_SERVER['DOCUMENT_ROOT'];
			
			$obj=new searchEngine($dir,$string); // searchEngine class instance
			
			$this->pages= array_chunk($obj->searchValue,$size);
			$this->Sstring=escapeshellcmd($string);
			
			if(empty($this->pages))
			{
				echo "<div style='font-size:17px;color:#036; text-align:center'><b><i>No result found for </i><u>".$this->Sstring."</u></b></div><br><br><br>";
			}
			else
			{
				echo "<div style='font-size:17px;color:#036; text-align:center'><b><i>".count($obj->searchValue)." Result(s) found for </i><u>".$this->Sstring."</u></b></div><br><br><br>";
			}

		}
	//------------------------------
		function paginate($pageid,$cssActive=NULL)
		{
			if(!$_REQUEST['showpage'] && $pageid==1) // No Request from pagination
			{
				return "<span class='".$cssActive."'>".$pageid."</span>";
			}
		
			//--------	// ----------
			if((int)$_REQUEST['showpage']==$pageid)
			{
				return "<span class='".$cssActive."'>".$pageid."</span>";
			}
	
			else
			{
				return $pageid;
			}
	
		}
		
		public function pagination($cssNext=NULL,$cssPrev=NULL,$cssPageNo=NULL,$cssActive=NULL)
		{
			$next=$this->getid+1;
			$prev=$this->getid-1;
			
			$SERVER=$_SERVER['PHP_SELF'];
			
			if($prev>0) // Preview
			{
				echo "<span class='".$cssPrev."'><a href=\"$this->SERVER?search=".$this->Sstring."&showpage=".$prev."\">Prev</a></span>";
			}
			
			for($i=1; $i< count($this->pages)+1; $i++) 
			{
				echo "<a class='".$cssPageNo."' href=\"$this->SERVER?search=".$this->Sstring."&showpage=".$i."\">".$this->paginate($i,$cssActive)."</a>";
			}
			
			if($next<=count($this->pages)) // Next
			{
				echo "<span class='".$cssNext."'><a href=\"$this->SERVER?search=".$this->Sstring."&showpage=".$next."\">Next</a></span>";
			}
		}
			
		public function foundItem($cssCap=NULL,$cssPage=NULL,$cssDes=NULL)
		{	
			$this->getid = (int)$_REQUEST['showpage'];
						
			if(empty($this->getid)) $this->getid=1;
			
			if(!empty($this->pages))
			{
				$pgkey=$this->getid-1;
				
				foreach($this->pages[$pgkey] as $key => $row)
				{ 
					$pageLink=str_replace($_SERVER[DOCUMENT_ROOT],$_SERVER[SERVER_NAME],$row['page']);
					
					echo "<p class='".$cssCap."'><a href='".'http://'.$pageLink."'>".$row['caption']."</a> </p>";
					echo "<div class='".$cssDes."'>".$row['descript']."</div>";
					
					echo '<br>';
				}
			}

		}
	}

?>