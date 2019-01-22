<?php
	if (isset($_GET["action"]) && isset($_GET["name"]))
	{
		if ($_GET['action'] == "set" && isset($_GET["value"]))
			setcookie($_GET['name'], $_GET['value'], time() + (86400 * 30));
		else if ($_GET['action'] == "get" && isset($_COOKIE[$_GET['name']]))
			echo ($_COOKIE[$_GET['name']])."\n";
		else if ($_GET['action'] == "del")
			setcookie($_GET['name'], NULL, time() - (86400 * 30));
	}
?>
