<?php

Class NightsWatch {

	private $team = array();

	public function __construct(){

	}

	public function __destruct() {

	}

	public function recruit($character) {
		array_push($this->team, $character);
	}

	public function fight() {
		foreach ($this->team as $character)
		{
			if ($character instanceof IFighter)
				$character->fight();
		}
	}

}

?>