#!/usr/bin/php
<?php

	$t = array();
	unset($argv[0]);
	foreach ($argv as $arg)
	{
		$arg = trim($arg);
		$str = preg_replace("/\s+/", " ", $arg);
		$tmp = explode(" ", $str);
		foreach ($tmp as $elem)
		{
			$t[] = $elem;
		}
	}
	sort($t);
	foreach ($t as $elem)
		echo "$elem\n";
?>
