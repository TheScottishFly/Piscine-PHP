#!/usr/bin/php
<?php
if ($argc == 2)
{
	$tab = array();
	$stdin = fopen('php://stdin', 'r');
	while ($stdin && !feof($stdin))
		$tab[] = explode(";", fgets($stdin));
	if ($argv[1] == "moyenne")
	{
		$a = array();
		foreach ($tab as $k => $v)
		{
			if (isset($v[2]) && $v[2] != "moulinette" && is_numeric($v[1]))
				$a[] = $v[1];
		}
		echo array_sum($a) / count($a) . "\n";
	}
	else if ($argv[1] == "moyenne_user")
	{
		$a = array();
		foreach ($tab as $v)
		{
			if (array_key_exists($v[0], $a) && is_numeric($v[1]) && $v[2] != "moulinette")
			{
				$a[$v[0]]["note"] = $a[$v[0]]["note"] + $v[1];
				$a[$v[0]]["div"]++;
			}
			else if (isset($v[1]) && is_numeric($v[1]) && isset($v[2]) && $v[2] != "moulinette")
			{
				$a[$v[0]]["note"] = $v[1];
				$a[$v[0]]["div"] = 1;
			}
		}
		ksort($a);
		foreach($a as $k => $v)
			echo $k.":".$a[$k]['note'] / $a[$k]['div']."\n";
	}
	else if ($argv[1] == "ecart_moulinette")
	{
		$a = array();
		$m = array();
		foreach ($tab as $v)
		{
			if (array_key_exists($v[0], $a) && is_numeric($v[1]) && $v[2] != "moulinette")
				$a[$v[0]][] = $v[1];
			else if (isset($v[1]) && is_numeric($v[1]) && isset($v[2]) && $v[2] != "moulinette")
				$a[$v[0]] = array($v[1]);
			else if (isset($v[1]) && is_numeric($v[1]) && isset($v[2]) && $v[2] == "moulinette")
				$m[$v[0]]= $v[1];
		}
		ksort($a);
		foreach($a as $k => $v)
		{
			for ($i = 0; $i < count($a[$k]); $i++)
				$a[$k][$i] = $a[$k][$i] - $m[$k];
			echo $k.":".array_sum($a[$k]) / count($a[$k])."\n";
		}
	}
	fclose($stdin);
}
?>
