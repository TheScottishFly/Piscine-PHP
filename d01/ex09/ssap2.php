#!/usr/bin/php
<?php

	$tstr = array();
	$nstr = array();
	unset($argv[0]);
	print_r($argv);
	foreach ($argv as $arg)
	{
		if (is_string($arg))
		{
			$str = preg_replace("/\s+/", " ", $arg);
			$tmp = explode(" ", $str);
			foreach ($tmp as $elem)
			{
				$tstr[] = $elem;
			}
		}
		else
		{
			$nstr[] = $arg;
		}
	}
	sort($tstr, SORT_NATURAL | SORT_FLAG_CASE);
	sort($nstr);
	$t = $tstr + $nstr;
	foreach ($t as $elem)
		echo "$elem\n";
?>
