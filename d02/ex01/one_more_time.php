#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');

function is_valid($argv)
{
	if (preg_match("/(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche) {1}([0-9]{1,2}) {1}([J|j]anvier|[F|f][e|é]vrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d][e|é]cembre) {1}[0-9]{4} {1}[0-9]{2}:[0-9]{2}:[0-9]{2}$/", $argv) != 0)
		return true;
	else
		return false;
}

function num_month($s1)
{
	if (preg_match("/([J|j]anvier)/", $s1))
		return 1;
	if (preg_match("/([F|f][e|é]vrier)/", $s1))
		return 2;
	if (preg_match("/([M|m]ars)/", $s1))
		return 3;
	if (preg_match("/([A|a]vril)/", $s1))
		return 4;
	if (preg_match("/([M|m]ai)/", $s1))
		return 5;
	if (preg_match("/([J|j]uin)/", $s1))
		return 6;
	if (preg_match("/([J|j]uillet)/", $s1))
		return 7;
	if (preg_match("/([A|a]o[u|û]t)/", $s1))
		return 8;
	if (preg_match("/([S|s]eptembre)/", $s1))
		return 9;
	if (preg_match("/([O|o]ctobre)/", $s1))
		return 10;
	if (preg_match("/([N|n]ovembre)/", $s1))
		return 11;
	if (preg_match("/([D|d][e|é]cembre)/", $s1))
		return 12;
}

if ($argc == 2)
{
	if (!is_valid($argv[1]))
		exit("Wrong Format\n");
	preg_match("/(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche)/", $argv[1], $jour);
	preg_match("/([0-9]{1,2})/", $argv[1], $num);
	preg_match("/([J|j]anvier|[F|f][e|é]vrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d][e|é]cembre)/", $argv[1], $mois);
	$m = num_month($mois[0]);
	preg_match("/[0-9]{4}/", $argv[1], $annee);
	if (!checkdate($m, $num[0], $annee[0]))
		exit("Invalid Date\n");
	preg_match("/[0-9]{2}:/", $argv[1], $heure);
	$heure[0] = substr($heure[0], 0, 2);
	preg_match("/:[0-9]{2}:/", $argv[1], $min);
	$min[0] = substr($min[0], 1);
	$min[0] = substr($min[0], 0, 2);
	preg_match("/:[0-9]{2}$/", $argv[1], $sec);
	$sec[0] = substr($sec[0], 1);
	echo mktime($heure[0], $min[0], $sec[0], $m, $num[0], $annee[0])."\n";
}
?>