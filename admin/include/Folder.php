<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Folder
 *
 * @author Mamun
 */
class Folder {
    //put your code here
    public static function Remove($directory) {
        $dir = opendir( $directory );
        while ( $file = @readdir( $dir ))
        {
            if( $file != '.' && $file != '..' )
            {
				if(is_dir($directory."/".$file))
				{
					self::Remove($directory."/".$file);
				}
                @unlink( $directory.'/'.$file );
            }
        }
        @closedir( $dir );
        
        if( @rmdir( $directory ) ) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>
