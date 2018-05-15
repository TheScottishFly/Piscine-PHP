#!/usr/bin/php
<?php
	while (1)
	{
		echo "Entrez un nombre: ";
		$input = trim(fgets(STDIN));
		if (feof(STDIN) == true)
			exit("\n");
		if (!is_numeric($input) || strlen($input) == 0)
			echo "'$input' n'est pas un chiffre\n";
		else
		{
			if ($input % 2 == 0)
				echo "Le chiffre $input est Pair\n";
			else
				echo "Le chiffre $input est Impair\n";
		}
	}
?>
