#!/usr/bin/php
<?php
if ($argc == 2)
{
	unset($argv[0]);
	$argv[1] = trim($argv[1]);
	$tab = preg_split('/(-|\/|%|\*|\+|\s+)/', $argv[1], -1, PREG_SPLIT_NO_EMPTY);
	$err = 0;
	$argv[1] = preg_replace('/\s+/', "", $argv[1]);
	for ($i=0; $i < strlen($argv[1]); $i++)
		if (!(is_numeric($argv[1][$i])))
			$err += 1;
	if (count($tab) != 2 || $err != 1)
		exit ("Syntax Error\n");
	if (strchr($argv[1], "+"))
		$nbr = $tab[0] + $tab[1];
	else if (strchr($argv[1], "-"))
		$nbr = $tab[0] - $tab[1];
	else if (strchr($argv[1], "*"))
		$nbr = $tab[0] * $tab[1];
	else if (strchr($argv[1], "/"))
		$nbr = $tab[0] / $tab[1];
	else if (strchr($argv[1], "%"))
		$nbr = $tab[0] % $tab[1];
	else
		exit ("Syntax Error\n");
	echo "$nbr\n";
}
else
	echo "Incorrect Parameters\n";
?>
