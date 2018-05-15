<?php
	function ft_split($str)
	{
		$str = trim($str);
		$ret = preg_split('/ +/', $str);
		sort($ret);
		return $ret;
	}
?>
