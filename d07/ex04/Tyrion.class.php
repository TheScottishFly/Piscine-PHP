<?php

Class Tyrion
{
	public function sleepWith($person)
	{
		if ($person instanceof Jaime || $person instanceof Cersei)
		{
			echo "Not even if I'm drunk !".PHP_EOL;
		}
		else if ($person instanceof Sansa)
		{
			echo "Let's do this.".PHP_EOL;

		}
		return;
	}
}

?>