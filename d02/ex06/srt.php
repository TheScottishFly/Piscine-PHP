#!/usr/bin/php
<?php

function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }
    array_multisort($sort_col, $dir, $arr);
}

if ($argc == 2 && file_exists($argv[1]))
{
	$i = 0;
	$stdin = fopen($argv[1], 'r');
	while ($stdin && !feof($stdin))
	{
		$line = trim(fgets($stdin));
		if (strlen($line) > 0)
			$tab[$i][] = $line;
		else
			$i++;
	}
	foreach($tab as $i => $v)
	{
		$tab[$i][3] = explode(' ', $tab[$i][1])[0];
		$tab[$i][3] = preg_replace("/[:,]/", "", $tab[$i][3]);
	}
	array_sort_by_column($tab, "3");
	foreach ($tab as $i => $v)
		$tab[$i][0] = $i + 1;
	foreach ($tab as $i => $v)
	{
		echo $v[0]."\n".$v[1]."\n".$v[2]."\n";
		if ($i < count($tab) - 1)
			echo "\n";
	}
}
?>
