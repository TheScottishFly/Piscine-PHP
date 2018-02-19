#!/usr/bin/php
<?php
	$stdin = fopen('php://stdin', 'r');
	while ($stdin && !feof($stdin))
	{
		echo "Entrez un nombre: ";
		$input = fgets($stdin);
		$input = str_replace("\n", "", "$input");
		if (!is_numeric($input) || strlen($input) == 0)
			echo "'$input' n'est pas un chiffre\n";
		else
		{
			if ($str % 2 == 0)
				echo "Le chiffre $input est Pair\n";
			else
				echo "Le chiffre $input est Impair\n";
		}
	}
?>
