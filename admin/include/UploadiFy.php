<?php
include_once 'DBConnect.php';
require_once 'Thumb.php';
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadiFy
 *
 * @author ASUS
 */
class UploadiFy {
    //put your code here
    public static function ImageUpload( $file, $dir, $maxsize = NULL, $dname = NULL )
    {
        //$imageName = substr( $_FILES[$file]["name"], -4 );
        $imageSource = $_FILES[$file]["tmp_name"];
        $imageSize = $_FILES[$file]["size"];
        $imageType = $_FILES[$file]["type"];

        if( $imageSize < $maxsize )
        {
            if( $imageType == "image/jpeg" || $imageType == "image/png" || $imageType == "image/gif" )
            {
                if( !copy( $imageSource, $dir.'/'.$dname ))
                    Notify::Error( "Could'nt copy <b>".$dname."</b>! Please try again." );
                
            }
            else
            {
                Notify::Attention( "Source image <b>".$dname."</b> doesn't supported type!" );
            }
        }
        else
        {
            Notify::Attention( "Source file <b>".$dname." is too large than MAX SIZE!" );
        }
    }

    public static function PdfUpload( $file, $dir, $maxsize = NULL, $dname = NULL )
    {
        //$pdfName = substr( $_FILES[$file]["name"], -4 );
        $pdfSource = $_FILES[$file]["tmp_name"];
        $pdfSize = $_FILES[$file]["size"];
        $pdfType = $_FILES[$file]["type"];

        if( $pdfSize < $maxsize )
        {
            if( $pdfType == "application/pdf" )
            {
                if( !copy( $pdfSource, $dir.'/'.$dname ))
                    Notify::Error( "Could'nt copy ".$file."! Please try again." );

            }
            else
            {
                Notify::Attention( "Source pdf <b>".$file."</b> doesn't supported type!" );
            }
        }
        else
        {
            Notify::Attention( "Source file <b>".$file."</b> is too large than MAX SIZE!" );
        }
    }
	
	public static function UploadWithThumb( $file, $dir, $maxsize = NULL, $dname = NULL )
    {
        //$imageName = substr( $_FILES[$file]["name"], -4 );
        $imageSource = $_FILES[$file]["tmp_name"];
        $imageSize = $_FILES[$file]["size"];
        $imageType = $_FILES[$file]["type"];

        if( $imageSize < $maxsize )
        {
            if( $imageType == "image/jpeg" || $imageType == "image/png" || $imageType == "image/gif" )
            {
                if( !copy( $imageSource, $dir.'/'.$dname ))
                    Notify::Error( "Could'nt copy <b>".$dname."</b>! Please try again." );
				else
					Thumbnail::SimpleThumb( $dir,$dname, "image/jpeg" );
                
            }
            else
            {
                Notify::Attention( "Source image <b>".$dname."</b> doesn't supported type!" );
            }
        }
        else
        {
            Notify::Attention( "Source file <b>".$dname." is too large than MAX SIZE!" );
        }
    }
}
?>
