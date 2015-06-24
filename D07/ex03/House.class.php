<?php

abstract Class House {

	abstract public function getHouseName();
	abstract public function getHouseSeat();
	abstract public function getHouseMotto();

	public function introduce() {
		$intro = "House ";
		$intro .= static::getHouseName();
		$intro .= " of ";
		$intro .= static::getHouseSeat();
		$intro .= " : \"";
		$intro .= static::getHouseMotto();
		$intro .= "\"".PHP_EOL;
		print ($intro);
	}
}

?>
