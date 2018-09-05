<?php
	function ft_is_sort($tab)
	{
		$ts = $tab;
		sort($ts);
		for ($i = 0; $i <= count($ts); $i++)
			if ($tab[$i] != $ts[$i])
				return false;
		return true;
	}
?>
