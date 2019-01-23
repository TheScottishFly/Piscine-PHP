#!/usr/bin/php
<?php
if (isset($argv[1]))
    $expl = explode(".", $argv[1]);
if ($argc == 3 && file_exists($argv[1]) && end($expl) == "csv")
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
		    if (array_key_exists($k, $values) && array_key_exists($i, $values))
    			${$v}[$values[$k]] = $values[$i];
	}
	fclose($stdin);
	while (1)
	{
		echo "Entrez votre commande: ";
		$input = trim(fgets(STDIN));
		if (feof(STDIN) == true)
			exit("");
		eval($input);
	}
}
?>
