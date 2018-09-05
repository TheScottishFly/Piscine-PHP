#!/usr/bin/php
<?php
	if ($argc < 2 || !file_exists($argv[1]))
		exit();
	$page = file_get_contents($argv[1]);
	$page = preg_replace_callback("/(<a )(.*?)(>)(.*)(<\/a>)/si", function($matches) {
		$matches[0] = preg_replace_callback("/( title=\")(.*?)(\")/i", function($matches) {
			return ($matches[1] . "" . strtoupper($matches[2]) . "" . $matches[3]);
		}, $matches[0]);
		$matches[0] = preg_replace_callback("/(>)(.*?)(<)/si", function($matches) {
			return ($matches[1] . "" . strtoupper($matches[2]) . "" . $matches[3]);
		}, $matches[0]);
		return ($matches[0]);
	}, $page);
	echo $page;
