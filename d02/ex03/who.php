#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');
	$f = fopen("/var/run/utmpx", "r");
	while ($bf = fread($f, 628)){
		$uf = unpack("a256a/a4b/a32c/id/ie/I2f/a256g/i16h", $bf);
		$tab[$uf['c']] = $uf;
	}
	ksort($tab);
	foreach ($tab as $item){
		if ($item['e'] == 7) {
			echo str_pad(substr(trim($item['a']), 0, 8), 8, " ") . " ";
			echo str_pad(substr(trim($item['c']), 0, 8), 8, " ") . " ";
			echo date("M", $item["f1"]);
			echo str_pad(date("j", $item["f1"]), 3, " ", STR_PAD_LEFT) . " " . date("H:i", $item["f1"]) . "\n";
		}
	}

?>
