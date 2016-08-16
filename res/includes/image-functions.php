<?php
/**
 * image-functions.php
 * @author Austin Fernandez
 * @20160609
 * This file manages image uploads
 */

/**
 * This uploads a list of photos to the given foldername under the uploads 
 * folder.
 * @param $folderName name of folder to save images in
 * @param $images list of images, each with 
 * 			name - name of image
 * 			size - size of image
 * 			tmp_name - temporary location of image
 * @return array of paths to the images or FALSE if an error occured
 */
function img_upload($folderName,$images) {
	$path = "../../uploads/".$folderName;
	mkdir($path);

	$imgCtr = 1;
	$paths = array();
	foreach($images as $image) {
		$ext = pathinfo(basename($image['name']),PATHINFO_EXTENSION);
		if( $ext === "jpeg" || $ext === "jpg" || $ext === "png" 
				|| $ext === "gif" ) {
			//10 MB lmit
			if( $image['size'] <= 10485760) {
				$filename = $path."/".$imgCtr.".".$ext;
				if( move_uploaded_file($image['tmp_name'], $filename)) {
					// echo $filename." has been uploaded.<br/>";
					$paths[] = substr($filename,6);
					$imgCtr++;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	return $paths;
}
?>