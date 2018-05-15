#!/usr/bin/php
<?php
	if ($argc > 0) {
		$i = 2;
		$v = $argv[1];
		$a = array();
		while ($argv[$i]) {
			$arg = explode(":", trim($argv[$i]));
			if (count($arg) == 2)
			{
				$key = trim($arg[0]);
				$value = trim($arg[1]);
				$a[$key] = $value;
			}
			$i += 1;
		}
		if (array_key_exists($v, $a))
			echo $a[$v] . "\n";
	}
?>
