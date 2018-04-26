#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$args = explode(" ", $argv[1]);
		$i = 0;
		foreach($args as $a) {
			if (strlen($a) == 0)
				unset($args[$i]);
			$i += 1;
		}
		$args = array_values(array_filter($args));
		if (count($args) != 3)
			echo "Incorrect Parameters\n";
		else {
			$o1 = trim($args[0]);
			$op = trim($args[1]);
			$o2 = trim($args[2]);
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
	}
	else
		echo "Incorrect Parameters\n";
?>
