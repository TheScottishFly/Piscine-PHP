#!/usr/bin/php
<?php
if ($argc != 2)
	exit("Incorrect Parameters\n");
if (!preg_match("#^\s*([+-]?[0-9]+)\s*([\+\-\*\/\%])\s*([+-]?[0-9]+)\s*$#", $argv[1], $match))
	exit("Syntax Error\n");
$op = $match[2];
$num1 = $match[1];
$num2 = $match[3];
switch ($op) {
case ("*") :
	echo $num1 * $num2;
	break;
case ("+") :
	echo $num1 + $num2;
	break;
case ("-") :
	echo $num1 - $num2;
	break;
case ("/") :
	echo $num1 / $num2;
	break;
case ("%") :
	echo $num1 % $num2;
	break;
default:
	echo "Syntax Error\n";
	exit();
}
echo "\n";
