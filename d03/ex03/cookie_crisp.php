<?php
	if (array_key_exists("action", $_GET))
	{
		$tab = $_GET;
		if (array_key_exists("name", $tab))
		{
			if ($tab['action'] == "set" && array_key_exists("value", $tab))
				setcookie($tab['name'], $tab['value']);
			else if ($tab['action'] == "get" && isset($_COOKIE[$tab['name']]))
				echo ($_COOKIE[$tab['name']])."\n";
			else if ($tab['action'] == "del")
				setcookie($tab['name'], NULL, -1);
		}
	}
