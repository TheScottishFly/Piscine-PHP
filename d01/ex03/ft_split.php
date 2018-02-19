#!/usr/bin/php
<?php

	function ft_split($str)
	{
		$t = explode(' ', $str);
		sort($t);
		return $t;
	}

?>
