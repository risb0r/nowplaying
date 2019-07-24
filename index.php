<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<head>
<title>Winamp Music Stats</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body class="mainbg">
<div align="center"><strong>Nowplaying Statistics</strong><br />
<br>
<table class="border" width="810">
<td><img src="nowplaying.php" border="1" alt="Now Playing Image Currently Is Unavalible"></td>
</table>

  <table width="98%"  border="0" align="center" cellspacing="5" class="border">
    <tr>
      <td width="50%" valign="top" class="border2">
	      <p align="center" class="boldish"><br />
          Top 10 Played Artists</p>
           <table width="98%" align="center" cellpadding="2" cellspacing="0" class="border">
		   <tr background="img/tile_up.gif"><td width="80%" align="left" class="sidedash"><strong>Artist</strong></td>
		   <td width="20%"><strong>Playcount</strong></td></tr>
		    <?php
			
			require('mysqlconf.php');
			require('choonfuncts.php');
			
			//These are the 2 colours used for the alternating row colours.
			$color1 = "#E4EAF2"; 
			$color2 = "#c0d4ed"; 
			
			$row_count = 0; 


			//Highest Artist Playcount. In order to make the table width percentages.
			$query =  mysql_query("SELECT artist, title, COUNT(*) AS played FROM winamp GROUP BY artist ORDER BY played DESC LIMIT 1");
			while($row = mysql_fetch_array($query) ) {
			$highartist = $row[played];
			}
			

			//Top Artists
			$query =  mysql_query("SELECT artist, title, COUNT(*) AS played FROM winamp GROUP BY artist ORDER BY played DESC LIMIT 10")
			or die(mysql_error());
			while( $row = mysql_fetch_array($query) ) {

			$row_color = ($row_count % 2) ? $color1 : $color2; 
			$share = round(100 * $row[played] / $highartist, 2);

			echo "<tr bgcolor=\"$row_color\">\n";
			echo "<td  class=\"sidedash\" width=\"80%\" align=\"left\">$row[artist] </td>\n";
			echo "<td align=\"center\" width=\"20%\">\n";
			echo "<table class=\"border2\" width=\"$share%\"  border=\"0\" align=\"left\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#E4EAF2\">";
			echo "<tr><td><div align=\"right\"><strong>$row[played]</strong></div></td></tr>\n";
			echo "</table>\n";
			echo "</td></tr>\n";

			$row_count++; 

			}

			?>
</table>
           <br />
      <div align="left"></div></td>
      <td width="50%" valign="top" class="border2">	    <div align="left">
	      <p class="boldish" align="center"><br />
          Top 10 Played Songs </p>
	      
            <table width="98%" align="center" cellpadding="2" cellspacing="0" class="border">
			<tr><td width="40%" align="left" background="img/tile_up.gif" class="sidedash"><strong>Artist</strong></td>
			<td width="40%" align="left" background="img/tile_up.gif" class="sidedash"><strong>Title</strong></td><td width="20%" bgcolor="#3399FF" background="img/tile_up.gif"><strong>Playcount</strong></td>
			</tr>
			<?php
			
			
			//Highest Song Playcount. In order to make the table width percentages.
			$query =  mysql_query("SELECT artist, title, COUNT(*) AS played FROM winamp GROUP BY title ORDER BY played DESC LIMIT 1");
			while($row = mysql_fetch_array($query) ) {
			$highsong = $row[played];
			}
			
			$row_count = 0; 
			
			//Top Songs
	  		$query =  mysql_query("SELECT artist, title, COUNT(*) AS played FROM winamp GROUP BY title ORDER BY played DESC LIMIT 10")
			or die(mysql_error());
			while( $row = mysql_fetch_array($query) ) {
		
			$row_color = ($row_count % 2) ? $color1 : $color2; 
			$share = round(100 * $row[played] / $highsong, 2);

			echo "<tr bgcolor=\"$row_color\">\n";
			echo "<td class=\"sidedash\" width=\"40%\" align=\"left\"><strong>$row[artist]</strong></td>\n";
			echo "<td class=\"sidedash\" width=\"40%\" align=\"left\">$row[title]</td>\n";
			echo "<td align=\"center\" bgcolor=\"$row_color\" width=\"20%\">\n";
			echo "<table class=\"border2\" width=\"$share%\"  border=\"0\" align=\"left\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#E4EAF2\">\n";
			echo "<tr><td><div align=\"right\"><strong>$row[played]</strong></div></td></tr>\n";
			echo "</table>\n";
			echo "</td></tr>\n";

			$row_count++; 
			
			}

			?>
	  </table>
	  </tr>
	        <br />
	  <tr>
			<br />
		      <div align="center"></div></td>
      <td width="50%" valign="top" class="border2">	    <div align="left">
	      <p class="boldish" align="center"><br />
          Top 10 Played Albums </p>
	      
            <table width="98%" align="center" cellpadding="2" cellspacing="0" class="border">
			<tr><td width="40%" align="left" bgcolor="#3399FF" background="img/tile_up.gif" class="sidedash"><strong>Artist - Album</strong></td>
			</td><td width="20%" bgcolor="#3399FF" background="img/tile_up.gif"><strong>Playcount</strong></td>
			</tr>
			<?php
			
			
			//Highest Song Playcount. In order to make the table width percentages.
			$query =  mysql_query("SELECT artist, album, COUNT(*) AS played FROM winamp GROUP BY album ORDER BY played DESC LIMIT 1");
			while($row = mysql_fetch_array($query) ) {
			$highsong = $row[played];
			}
			
			$row_count = 0; 
			
			//Top Songs
	  		$query =  mysql_query("SELECT artist, album, COUNT(*) AS played FROM winamp GROUP BY album ORDER BY played DESC LIMIT 10")
			or die(mysql_error());
			while( $row = mysql_fetch_array($query) ) {
		
			$row_color = ($row_count % 2) ? $color1 : $color2; 
			$share = round(100 * $row[played] / $highsong, 2);

			echo "<tr bgcolor=\"$row_color\">\n";
			echo "<td class=\"sidedash\" width=\"40%\" align=\"left\">$row[artist] - <strong>$row[album]</strong></strong></td>\n";
			echo "<td align=\"center\" bgcolor=\"$row_color\" width=\"20%\">\n";
			echo "<table class=\"border2\" width=\"$share%\"  border=\"0\" align=\"left\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#E4EAF2\">\n";
			echo "<tr><td><div align=\"right\"><strong>$row[played]</strong></div></td></tr>\n";
			echo "</table>\n";
			echo "</td></tr>\n";

			$row_count++; 
			
			}

			?>
			</table>

			<br />
			<div align="left"></div></td>
			<td width="50%" valign="top" class="border2">		<div align="left">
		   <p class="boldish" align="center"><br />
          Top 10 Played Genres</p>
           <table width="98%" align="center" cellpadding="2" cellspacing="0" class="border">
		   <tr bgcolor="#3399FF" background="img/tile_up.gif"><td width="80%" align="left" class="sidedash"><strong>Artist</strong></td>
		   <td width="20%"><strong>Playcount</strong></td></tr>
		    <?php
			
			$row_count = 0; 


			//Highest Artist Playcount. In order to make the table width percentages.
			$query =  mysql_query("SELECT genre, COUNT(*) AS played FROM winamp GROUP BY genre ORDER BY played DESC LIMIT 1");
			while($row = mysql_fetch_array($query) ) {
			$highartist = $row[played];
			}
			

			//Top Artists
			$query =  mysql_query("SELECT genre, COUNT(*) AS played FROM winamp GROUP BY genre ORDER BY played DESC LIMIT 10")
			or die(mysql_error());
			while( $row = mysql_fetch_array($query) ) {

			$row_color = ($row_count % 2) ? $color1 : $color2; 
			$share = round(100 * $row[played] / $highartist, 2);

			echo "<tr bgcolor=\"$row_color\">\n";
			echo "<td  class=\"sidedash\" width=\"80%\" align=\"left\">$row[genre] </td>\n";
			echo "<td align=\"center\" width=\"20%\">\n";
			echo "<table class=\"border2\" width=\"$share%\"  border=\"0\" align=\"left\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#E4EAF2\">\n";
			echo "<tr><td><div align=\"right\"><strong>$row[played]</strong></div></td></tr>\n";
			echo "</table>\n";
			echo "</td></tr>\n";

			$row_count++; 

			}

			?>
			</table>
      </div>
      <div align="left"></div></td>
    </tr>
    <tr valign="top">
      <td colspan="2" class="border2">
	  
	    <div align="center">
	      <p class="boldish"><br />
          Last 50 Played Tracks</p>
	      <table width="80%" align="center" cellpadding="2" cellspacing="0" class="border">
			<tr><td width="30%" align="left" bgcolor="#3399FF" background="img/tile_up.gif" class="sidedash"><strong>Artist</strong></td>
			<td width="30%" align="left" bgcolor="#3399FF" background="img/tile_up.gif" class="sidedash"><strong>Title</strong></td>
            <td width="20%" align="center" bgcolor="#3399FF" background="img/tile_up.gif" class="sidedash"><strong>Played</strong></td>
			</tr>
	        <?php

			
			$row_count = 0; 
			
			//Last 50 Tracks
			$query =  mysql_query("SELECT * FROM winamp ORDER BY id DESC LIMIT 50");
			while( $row = mysql_fetch_array($query) ) {

			$artistsrch = str_replace(" ","+",$row[artist]);
			$titlesrch = str_replace(" ","+",$row[title]);
			$musicdb  = "http://www.freedb.org/freedb_search.php?words=$artistsrch+$titlesrch&allfields=NO&fields=artist&fields=title&allcats=YES&grouping=none";
			$row_color = ($row_count % 2) ? $color1 : $color2; 
			
			$startTime = "$row[thetime]";
			$endTime = date("Y-m-d H:i:s");
			$last = timediff($startTime,$endTime);
			$lastsplit = explode(":", $last);
			$hh  = $lastsplit[0];
			$mm = $lastsplit[1];
			
			if ($hh == "0"){
			
			$timediff = "$mm Mins ago";
			}else{
			
			$timediff = "$hh H $mm Mins ago";
			}

			echo "<tr>\n";
			echo "<td class=\"sidedash\" bgcolor=\"$row_color\" width=\"40%\" align=\"left\">\n";
			echo "<strong>$row[artist]</strong>\n";
			echo "</td>\n";
			echo "<td class=\"sidedash\" bgcolor=\"$row_color\" width=\"40%\" align=\"left\">\n";
			echo "$row[title]</td>\n";
			echo "<td width=\"20%\" align=\"center\" bgcolor=\"$row_color\">$timediff</td>\n";
			echo "</tr>\n";
			$row_count++;

 			}
			?>
</table>
            <br />
      </div>
</div>
<br>
<!--<center>
Winamp Now-Playing<br />
&copy 2005-2007 <a href="http://www.Spiraloz.com">Sebastian Conn</a> and <a href="mailto:risbo@netspace.net.au">Michael Risby</a><br />
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="img/wc3-css.gif" width="48" height="18" border="0" alt="wc3-css"></a>&nbsp;<img src="img/wc3-html.gif" width="48" height="18" border="0" alt="wc3-html">
</center> -->
<table width="1617">
			<td width="44%" align="left"><strong>Last updated:</strong> <!-- #BeginDate format:Am1 -->May 25, 2007<!-- #EndDate--></td>
            <td width="13%" align="center"><a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="img/wc3-css.gif" width="48" height="18" border="0" alt="wc3-css"></a>&nbsp;<img src="img/wc3-html.gif" width="48" height="18" border="0" alt="wc3-html"></td>
            <td width="43%" align="right">&copy 2005-2007 <a href="http://www.Spiraloz.com">Sebastian Conn</a> and <a href="mailto:risbo@netspace.net.au">Michael Risby</a></td>
</table>
</body>
</html>
