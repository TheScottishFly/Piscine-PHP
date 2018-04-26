#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$o1 = trim($argv[1]);
		$op = trim($argv[2]);
		$o2 = trim($argv[3]);

		if (!in_array($op, array("+", "-", "/", "%", "*")))
			echo "Incorrect Parameters\n";
		else {
			if ($op == "/")
				$ret = $o1 / $o2;
			elseif ($op == "*")
				$ret = $o1 * $o2;
			elseif ($op == '-')
				$ret = $o1 - $o2;
			elseif ($op == "%")
				$ret = $o1 % $o2;
			elseif ($op == '+')
				$ret = $o1 + $o2;
			echo $ret . "\n";
		}
	}
	else
		echo "Incorrect Parameters\n";
?>
