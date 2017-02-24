<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('fetch_image'))
{
	function fetch_image($url = ""){
		if($url){
			$img = imagecreatefromstring(file_get_contents($url));//Creating Image from string
			// Start buffering of image in PNG
			ob_start();
			imagepng($img);
			$CleanImg = ob_get_contents();
			ob_end_clean();
			return $CleanImg;
		}
		return "";
	}
}