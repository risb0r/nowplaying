<?PHP

$startTime = "2007-17-03 01:49:00";
$endTime =  "0000-00-00 00:00:00";

function timediff($startTime,$endTime){ 
    //you can modify what the function returns 
    global $timediff;  //global array if you need it 
    $a = strtotime($endTime) - strtotime($startTime); 
    $w = $a/3600; //hours.minutes 
    $h = floor($w); 
    $ms = $w - floor($w); 
    $ms = $ms*60;  //minutes.seconds 
    $m = floor($ms); 
    $s = number_format(($ms - $m)*60,3); 
    //basics, declare other parts if needing decimal portions 
    $timediff['hours']=$h; 
    $timediff['minutes']=$m; 
    $timediff['seconds']=$s; 
    return "$h:$m:$s"; 
} 

			$year = date("Y");
			$month = date("m");
			$day = date("d");
			$hours = date("H");
			$minutes = date("i");
			$seconds = date("s");
			$date = "$year-$month-$day $hours:$minutes:$seconds";

?>