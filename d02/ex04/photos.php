#!/usr/bin/php
<?php

function get_content($URL){
	$ch = curl_init($URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function download($url, $folder, $base_url){
	$expl = explode("/", $url);
	$filename = end($expl);
	$fp = fopen("$folder/$filename", 'w');
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
}

function ft_img($link)
{
	if (!preg_match("/(src=[\"'])(.*?)([\"'])/si", $link, $img))
		preg_match("/(src=)([^\"'].*?)([ >])/si", $link, $img);
	return ($img[2]);
}

if ($argc == 1)
	exit("\n");
preg_match("/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/", $argv[1], $dir);
$folder = "$dir[2].$dir[3]";
if (!file_exists($folder))
	mkdir($folder);
$string = get_content($argv[1]);
preg_match_all("/(<img)(.*?)(>)/si", $string, $match);
foreach ($match as $i => $v)
{
	if (count($v) == 0)
		unset($match[$i]);
}
if (count($match) == 0)
	exit();
foreach ($match[0] as $v)
{
	$i = ft_img($v);
	if (!preg_match("/:\/\//", $i))
	{
		if ($i[0] == '/')
			$i = $argv[1].$i;
		else
			$i = "$argv[1]/$i";
	}
	if (!preg_match("/^http/", $i))
		$i = "http://$i";
	$img[] = $i;
}
foreach ($img as $v)
	download($v, $folder, $argv[1]);
?>
