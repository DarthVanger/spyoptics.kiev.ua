<?php
		/**
         *  Edited by me to enlarge photos by supplying bigger height.
		 *	Original copied from stackoverflow (link: http://stackoverflow.com/questions/14649645/resize-image-in-php).
		 */
		function resize_image($file, $w, $h, $crop=FALSE) {
			list($width, $height) = getimagesize($file);
			$r = $width / $height;
			if ($crop) {
					if ($width > $height) {
							$width = ceil($width-($width*abs($r-$w/$h)));
					} else {
							$height = ceil($height-($height*abs($r-$w/$h)));
					}
					$newwidth = $w;
					$newheight = $h;
			} else {
					if ($w/$h > $r) {
							$newwidth = $h*$r;
							$newheight = $h;
					} else {
							$newheight = $h;
							$newwidth = $h/$height * $width;
                            if($newwidth >= 1300) {
                                $newwidth = 1300;
                                $newheight = $newwidth/$width * $height;
                            }
					}
			}
			$src = imagecreatefromjpeg($file);
			$dst = imagecreatetruecolor($newwidth, $newheight);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			return $dst;
		}
