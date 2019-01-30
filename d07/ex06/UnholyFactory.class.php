<?php

include_once('Fighter.class.php');

class UnholyFactory {
	private $_absorbed_fighters;

	function __construct()
    {
		$this->_absorbed_fighters = array();
	}
	
	function absorb($person)
    {
		if ($person instanceof Fighter)
		{
			if ($this->_alreadyAbsorbed($person))
			{
				print( '(Factory already absorbed a fighter of type ' . $person . ')' . PHP_EOL );
			}
			else
            {
				array_push($this->_absorbed_fighters, $person);
				print( '(Factory absorbed a fighter of type ' . $person . ')' . PHP_EOL );
			}
		}
		else
        {
			print( "(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}
	}

	private function _alreadyAbsorbed($person)
    {
		foreach ($this->_absorbed_fighters as $fighter)
		{
			if ($person == $fighter)
			{
				return True;
			}
		}
		return False;
	}

	function fabricate($name) {
		foreach ($this->_absorbed_fighters as $fighter)
		{
			if ($fighter->name === $name)
			{
				print( "(Factory fabricates a fighter of type " . $name . ")" . PHP_EOL );
				return clone $fighter;
			}
		}
		print( "(Factory hasn't absorbed any fighter of type " . $name . ")" . PHP_EOL );
		return null;
	}
}

?>