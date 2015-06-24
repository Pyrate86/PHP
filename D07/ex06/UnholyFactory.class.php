<?php

Class UnholyFactory {

	private $types = array();

	public function __construct(){

	}

	public function __destruct(){

	}

	public function absorb($fighter)
	{
		if ($fighter instanceof Fighter)
		{
			if (in_array($fighter, $this->types))
				echo "(Factory already absorbed a fighter of type ".$fighter->getType().")".PHP_EOL;
			else
			{
				array_push($this->types, $fighter);
				echo "(Factory absorbed a fighter of type ".$fighter->getType().")".PHP_EOL;
			}
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
	}

	public function fabricate($type){
		foreach ($this->types as $key => $value) {
			if ($value->getType() == $type)
			{
				echo "(Factory fabricates a fighter of type ".$type.")".PHP_EOL;
				return clone $value;
			}
		}
			echo "(Factory hasn't absorbed any fighter of type ".$type.")".PHP_EOL;
	}
}

?>