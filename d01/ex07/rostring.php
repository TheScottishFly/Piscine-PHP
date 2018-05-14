#!/usr/bin/php
<?php

	if ($argc > 1)
	{
		$arg = trim($argv[1]);
		$t = explode(" ", $arg);
		$t[] = $t[0];
		unset($t[0]);
		$str = preg_replace("/\s+/", " ", implode(" ", $t));
		echo "$str\n";
	}

?>
