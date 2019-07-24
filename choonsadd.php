<?php
/* require('mysqlconf.php');

$query = "INSERT INTO $table (artist,title,genre,album,thetime) VALUES ('$artist','$title','$genre','$album',NOW())";
mysql_query($query)
or die("Couldn't Execute $sql: ".mysql_error());
 */
?>

<?php
foreach($_POST["Song"] as $song){
require('mysqlconf.php');
$query = "INSERT INTO winamp (artist,title,genre,album,thetime) VALUES ('".$song["Artist"]."','".$song["Title"]."','".$song["Genre"]."','".$song["$album"].",NOW())";
mysql_query($query)
or die("Couldn't Execute $sql: ".mysql_error());
}
?>