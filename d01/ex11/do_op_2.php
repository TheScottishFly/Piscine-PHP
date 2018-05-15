#!/usr/bin/php
<?php
	function find_op($str){
		for ($i = 0; $i < strlen($str); $i++)
		{
			if ($str[$i] == "+")
				return 1;
			if ($str[$i] == "-")
				return 2;
			if ($str[$i] == "*")
				return 3;
			if ($str[$i] == "/")
				return 4;
			if ($str[$i] == "%")
				return 5;
			$i++;
		}
		return (0);
	}
	
	if ($argc != 2)
		exit("Incorrect Parameters\n");
	$a = preg_split('/(-|\/|%|\*|\+|\s+)/', trim($argv[1]), -1, PREG_SPLIT_NO_EMPTY);
	if (count($a) != 2)
		exit("Incorrect Parameters\n");
	$argv[1] = preg_replace('/\s+/', '', $argv[1]);
	$op = find_op($argv[1]);
	if ($op == 0)
		exit("Syntax Error\n");
	$arr = preg_split("/(-|\/|%|\*|\+)/", $argv[1], -1, PREG_SPLIT_NO_EMPTY);
	if(is_numeric($arr[0]) && is_numeric($arr[1]))
	{
		if ($op == 1)
			$res = $arr[0] + $arr[1];
		else if ($op == 2)
			$res = $arr[0] - $arr[1];
		else if ($op == 3)
			$res = $arr[0] * $arr[1];
		else if ($op == 4)
			$res = $arr[0] / $arr[1];
		else if ($op == 5)
			$res = $arr[0] % $arr[1];
		else
			echo "Syntax Error\n";
		echo "$res\n";
	}
	else
		echo "Syntax Error\n";
?>
