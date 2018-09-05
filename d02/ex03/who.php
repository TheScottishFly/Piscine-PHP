#!/usr/bin/php
<?php
date_default_timezone_set('Europe/paris');
$file = fopen("/var/run/utmpx", "r");
while ($line = fread($file, 628))
{
	$array = unpack('a256user/a4id/a32term/ipid/itype/Itime', $line);
	if ($array[type] == 7)
		echo trim($array[user]) . " " . trim($array[term]) . "  " . date("M j H:i", $array[time]) . " \n";
}
?>
