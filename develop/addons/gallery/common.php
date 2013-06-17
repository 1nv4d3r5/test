<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Gallery common module common.php
| Version 3.2.4 SQLite/MySQL/Mini
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
function createThumb( $pathTofile, $pathToThumbs="thumbs/", $thumbWidth=100 ) {
	$info = pathinfo($pathTofile);
	$fname= $info['basename'];
	if(file_exists($pathToThumbs.$fname))
		return $fname;
	// check for the type of image
	switch ( strtolower($info['extension'])) {
		case "jpg":
			$img = imagecreatefromjpeg( $pathTofile );
			break;
		case "png":
			$img = imagecreatefrompng( $pathTofile );
			break;
		case "gif":
			$img = imagecreatefromgif( $pathTofile );
			break;
		default:
			return false;
	}
	$width = imagesx( $img );
	$height = imagesy( $img );
	// calculate thumbnail size
	$new_width = $thumbWidth;
	$new_height = floor( $height * ( $thumbWidth / $width ) );
	// create a new tempopary image
	$tmp_img = imagecreatetruecolor( $new_width, $new_height );
	// copy and resize old image into new image
	imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
	// save thumbnail into a file
	switch ( strtolower($info['extension'])) {
		case "jpg":
			imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
			break;
		case "png":
			imagepng( $tmp_img, "{$pathToThumbs}{$fname}" );
			break;
		case "gif":
			imagegif( $tmp_img, "{$pathToThumbs}{$fname}" );
			break;
	}
	imagedestroy($img);
	return $fname;
}
?>
