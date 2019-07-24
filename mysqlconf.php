<?php

//put your MySQL Information in the supplied spots

$db = "choonstats" ;
$pass = "xxxxxxxx" ;
$dbloc = "localhost" ; 
$table = "winamp" ;
$user = "root" ;

$link = mysql_connect("$dbloc","$user","$pass");

if (! $link)
die("Couldn't connect to MySQL");

mysql_select_db($db , $link)
or die("Couldn't open $db: ".mysql_error());

?>
