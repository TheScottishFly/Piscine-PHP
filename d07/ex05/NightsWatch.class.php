<?php

include_once('IFighter.class.php');

class NightsWatch 
{
	private $_watchers = array();
	
	public function __construct() 
	{
		$this->_watchers = array();
	}
	
	public function recruit($person)
	{
		if ($person instanceof IFighter)
		{
			array_push($this->_watchers, $person);
		}
	}
	
	public function fight() 
	{
		foreach ($this->_watchers as $person)
		{
			$person->fight();
		}
	}
}

?>