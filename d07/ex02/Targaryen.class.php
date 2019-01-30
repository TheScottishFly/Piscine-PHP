<?php

Class Targaryen
{
	public static $flag = 0;
	public function getBurned()
	{
		if (self::$flag == 0)
		{
			self::$flag++;
			return 'burns alive';
		}
		else
		{
			return 'emerges naked but unharmed';	
		}
	}
}

?>