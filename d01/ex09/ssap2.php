#!/usr/bin/php
<?php
	function compareASCII($a, $b) {
		$at = iconv('UTF-8', 'ASCII//TRANSLIT', $a);
		$bt = iconv('UTF-8', 'ASCII//TRANSLIT', $b);
		return strcmp($at, $bt);
	}

	$i = 0;
	$tstr = array();
	$nstr = array();
	$sstr = array();
	unset($argv[0]);
	foreach ($argv as $arg)
	{
		$arg = trim($arg);
		$str = preg_replace("/\s+/", " ", $arg);
		$tmp = explode(" ", $str);
		foreach ($tmp as $elem)
		{
			if (is_numeric($elem[0]))
				$nstr[$i] = $elem;
			else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $elem[0]))
				$sstr[$i] = $elem;
			else
				$tstr[$i] = $elem;
			$i += 1;
		}
	}
	asort($tstr, SORT_NATURAL | SORT_FLAG_CASE);
	uasort($nstr, "compareASCII");
	uasort($sstr, "compareASCII");
	$t = $tstr + $nstr + $sstr;
	foreach ($t as $elem)
		echo "$elem\n";
?>
