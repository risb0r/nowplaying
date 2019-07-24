<?php
include("mysqlconf.php");

	// Cut Function
	function cut($str,$len) {
		if (strlen($str) > $len) {
			return substr($str,0,$len).'...';
		} else {
			return $str;
		}
	}

	// Create The Image
	header("Content-type: image/png");
	$bg = 'bg.png';
	$im = @ImageCreateFromPNG($bg)
		or die("Cannot Initialize new GD image stream");

	// Gather data
	$get="SELECT artist, title, genre, thetime FROM winamp ORDER BY id desc LIMIT 3";
	$get2=mysql_query($get) or die("Could not query database.<br>".mysql_error());
	if(mysql_num_rows($get2) != 0) {
		$i=0;

		// Loop the array
		while($get3=mysql_fetch_array($get2)) {
			if($i == 0) {
				list($year, $month, $day, $hour, $minute, $second) = split("[-:]", $get3[thetime]);
				 if(mktime($hour, $minute, $second, $day, $month, $year) <= date("U") - 10080) {
					$active = "";
				} else {
					$active = " ";
				}
				$now = $get3[artist]." - ".$get3[title];
				$i++;
			} elseif($i == 1) {
				$hyst1 = $get3[artist]." - ".$get3[title];
				$i++;
			} else {
				$hyst2 = $get3[artist]." - ".$get3[title];
			}
		}
	} else {
		$now = 'Sorry, no records found in the database';
	}

	// Gathering most played song
	$stat="SELECT artist, title, COUNT(*) AS played FROM winamp GROUP BY title ORDER BY title DESC LIMIT 1";
	$stat2=mysql_query($stat) or die("Could not query database.<br>".mysql_error());
	$stat3=mysql_fetch_object($stat2);
	$most = $stat3->artist;

	// Width of the text in characters
	$width = 90;
	$font  = 3;

	// Set the color (255,255,255 == white, 0,0,0 == black)
	$white = imagecolorallocate($im, 255, 255, 255);
	$black = imagecolorallocate($im, 0, 0, 0);

	// Write the lines to the image
	imagestring($im, $font, 82, 15, ' '. $active, $white);
	imagestring($im, $font, 82, 2, ' '. cut($now, $width), $white);
	imagestring($im, $font, 82, 29, ' '. cut($hyst1, $width), $white);
	imagestring($im, $font, 82, 57, ' '. cut($hyst2, $width), $white);
	imagestring($im, $font, 82, 85, ' '. cut($most, $width), $white);

	// Finish and clean up
	ImagePNG($im);
	ImageDestroy($im);
?>