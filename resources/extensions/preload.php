<?php

//  author:   David Tucker
//  modified: 2014-07-07
//  modified: 2014-07-07
//  status:   beta (debugged, untested)
//
//  Description
//      boosts performance when loading a site
//
//
//  Constants
//      $_SESSION
//          preload_images
//              TRUE if the request is a user's first unique visit
//              FALSE otherwise
//
//  Database
//      none
//
//  Functions (1)
//      preload_images
//
//  Requirements
//      The following PHP block must be placed at the end of the HTML body of the loading document:
//          if ($_SESSION["preload_images"]) preload_images();
//      $_SESSION
//
//
//  Notes
//      none

if (!isset($_SESSION) and !session_start()) throw new Exception("A session could not be started.");
assert (isset($_SESSION));

//CONSTANTS
if (!array_key_exists("preload_images",$_SESSION)) $_SESSION["preload_images"] = TRUE; //boolean

/******************************************************************************************************
Description
	preloads all images in a site recursively

Order Θ(i+s)
	i = # of images
	s = # of subdirectories

Parameters
	[pwd]
		the present working directory
		This parameter is automatically set and recursivey maintained.
		It should only be specified if there are images somewhere other than the default images folder.

Return Values
	No value is returned.

******************************************************************************************************/
function preload_images ($pwd=FALSE)
{
	if ($pwd === FALSE) {
		$pwd = $_SERVER["DOCUMENT_ROOT"]."/resources/images/";
		?><!-- image preloads --><?php echo PHP_EOL;
		$_SESSION["preload_images"] = FALSE;
	}
	
	//pre-condition
	assert (is_dir($pwd));
	
	$files = scandir($pwd);
	foreach ($files as $file) if (substr($file,0,1) != '.')
		if (is_dir($pwd.$file)) : preload_images($pwd.$file.'/');
		else                    : ?><img src="<?php echo $pwd.$file; ?>" alt="" style="display:none;" /><?php echo PHP_EOL;
		endif;
}

/**/

?>