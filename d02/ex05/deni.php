#!/usr/bin/php
<?php
if ($argc == 3 && file_exists($argv[1]) && end(explode(".", $argv[1])) == "csv")
{
	$stdin = fopen($argv[1], 'r');
	$keys = explode(";", trim(fgets($stdin)));
	if (!in_array($argv[2], $keys))
		exit();
	$k = array_search($argv[2], $keys);
	while ($stdin && !feof($stdin))
	{
		$values = explode(";", trim(fgets($stdin)));
		foreach ($keys as $i => $v)
			${$v}[$values[$k]] = $values[$i];
	}
	fclose($stdin);
	while (1)
	{
		echo "Entrez votre commande: ";
		$input = trim(fgets(STDIN));
		if (feof(STDIN) == true)
			exit("");
		$ret = eval($input);
		echo $ret;
	}
}
?>
