#!/usr/bin/php
<?php
	if ($argc > 0) {
		$i = 2;
		if (isset($argv[1]))
    		$v = $argv[1];
		$a = array();
		while (isset($argv[$i])) {
			$arg = explode(":", $argv[$i]);
			$key = $arg[0];
			$value = $arg[1];
			$a[$key] = $value;
			$i += 1;
		}
		if (isset($v) && array_key_exists($v, $a))
			echo $a[$v] . "\n";
	}
?>
