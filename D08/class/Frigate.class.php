<?php

require_once("Database.class.php");

Class Frigate extends Ship {

/*###########################################################################\
|#		Attribute															#|
\###########################################################################*/

/*---------------------------------------------------------------------------\
||		CONST && DEST														||
\---------------------------------------------------------------------------*/

	public function __construct(array $kwargs){
		$ship = Database::getShip("Frigate");
		$ship['size'] = array('width' => $ship['width'], 'height' => $ship['height']);
		$ship['name'] = $kwargs['name'];
		$ship['weapon'] = clone $kwargs['weapon'];
		$ship['position'] = $kwargs['position'];
		$ship['player'] = $kwargs['player'];

		parent::__construct($ship);
	}

	public function __destruct(){
	}

/****************************************************************************\
|*		Public methods																*|
\****************************************************************************/



/*\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/
\/		Static functions													\/
\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/*/

	public static function doc()
	{
		$fp = fopen ("class/doc/".get_class().".doc.txt", "r");
		while ($doc = fgets ($fp))
			echo $doc;
		echo PHP_EOL;
		fclose ($fp);
	}

}

?>