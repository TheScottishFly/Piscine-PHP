#!/usr/bin/php
<?php

	if ($argc > 1)
	{
		$t = explode(" ", $argv[1]);
		$t[] = $t[0];
		print_r($t);
		unset($t[0]);
		$str = preg_replace("/\s+/", " ", implode(" ", $t));
		echo "$str\n";
	}

?>
