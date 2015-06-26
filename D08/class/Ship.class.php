<?php

require_once("class/IMove.interface.php");

abstract Class Ship implements IMove{

/*###########################################################################\
|#		Attribute															#|
\###########################################################################*/

	public static $verbose = FALSE;

	protected $_type;
	protected $_name;
	protected $_sprite;
	protected $_size;
	protected $_hull;
	protected $_engine;
	protected $_speed;
	protected $_maneuver;
	protected $_shield;
	protected $_weapon;

	protected $_position;
	protected $_direction;
	protected $_played = FALSE;

	protected $_player;

/*---------------------------------------------------------------------------\
||		CONST && DEST														||
\---------------------------------------------------------------------------*/

	public function __construct(array $kwargs){
		$this->setType($kwargs['type']);
		$this->setName($kwargs['name']);
		$this->setSprite($kwargs['sprite']);
		$this->setSize($kwargs['size']);
		$this->setHull($kwargs['hull']);
		$this->setEngine($kwargs['engine']);
		$this->setSpeed($kwargs['speed']);
		$this->setManeuver($kwargs['maneuver']);
		$this->setShield($kwargs['shield']);
		$this->setWeapon($kwargs['weapon']);
		$this->setPosition($kwargs['position']);
		$this->setPlayer($kwargs['player']);

		if (self::$verbose)
			echo "'".static::getName()."'".$this->getConstruct()." constructed".PHP_EOL;
	}

	public function __destruct(){
			if (self::$verbose)
				echo "'".$this->getName()."' destructed".PHP_EOL;
	}

/****************************************************************************\
|*		Public methods																*|
\****************************************************************************/

	public function turn_left(){
		
	}

	public function turn_right(){
		
	}

	public function forward(){
		
	}

	public function __toString()
	{
		$str = "Nom : '";
		$str .= $this->getName();
		$str .= "' (";
		$str .= $this->getType();
		$str .= ")\nPosition [";
		$str .= $this->getPosition()['x'];
		$str .= "][";
		$str .= $this->getPosition()['y'];
		$str .= "]\nDirection : ";
		$str .= Direction::getDirection($this->getPosition()['direction']);
		$str .="\nTaille : ";
		$str .= $this->getSize()['width'];
		$str .= "x";
		$str .= $this->getSize()['height'];
		$str .= " cases\nPoints de coque : ";
		$str .= $this->getHull();
		$str .= "\nPP : ";
		$str .= $this->getEngine();
		$str .= "\nVitesse : ";
		$str .= $this->getSpeed();
		$str .= "\nManoeuvre : ";
		$str .= $this->getManeuver();
		$str .= "\nBouclier : ";
		$str .= $this->getShield();
		$str .= "\nArme : ";
		$str .= $this->getWeapon()->getName().PHP_EOL;
		return $str;
	}

/*|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||\
||		Private methods																||
\|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/



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

/*////////////////////////////////////////////////////////////////////////////
//		GETTERS																//
////////////////////////////////////////////////////////////////////////////*/

	public function getType ()
	{
		return $this->_type;
	}

	public function getName ()
	{
		return $this->_name;
	}

	public function getSprite ()
	{
		return $this->_sprite;
	}

	public function getSize ()
	{
		return $this->_size;
	}

	public function getHull ()
	{
		return $this->_hull;
	}

	public function getEngine ()
	{
		return $this->_engine;
	}

	public function getSpeed ()
	{
		return $this->_speed;
	}

	public function getManeuver ()
	{
		return $this->_maneuver;
	}

	public function getShield ()
	{
		return $this->_shield;
	}

	public function getWeapon ()
	{
		return $this->_weapon;
	}

	public function getPosition()
	{
		return $this->_position;
	}

	public function getPlayer()
	{
		return $this->_player;
	}

	public function playable()
	{
		return $this->_played;
	}

	private function getConstruct()
	{
		$str = "(";
		$str .= $this->getType();
		$str .= ", ";
		$str .= $this->getName();
		$str .= ", ";
		$str .= $this->getSprite();
		$str .= ", array( 'width' => ";
		$str .= $this->getSize()['width'];
		$str .= ", 'height' => ";
		$str .= $this->getSize()['height'];
		$str .= "), ";
		$str .= $this->getHull();
		$str .= ", ";
		$str .= $this->getEngine();
		$str .= ", ";
		$str .= $this->getSpeed();
		$str .= ", ";
		$str .= $this->getManeuver();
		$str .= ", ";
		$str .= $this->getShield();
		$str .= ", ";
		$str .= $this->getWeapon()->getName();
		$str .= ")";
		return $str;
	}

/*\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
\\		SETTERS																\\
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\*/

	public function setType ($value)
	{
		$this->_type = $value;
	}

	public function setName ($value)
	{
		$this->_name = $value;
	}

	public function setSprite ($value)
	{
		$this->_sprite = $value;
	}

	public function setSize (array $value)
	{
		if (array_key_exists("width", $value) && array_key_exists("height", $value))
			$this->_size = $value;
		else
		{
			if (self::$verbose)
				{
					echo "Error : Bad size format : ".PHP_EOL;
					self::doc();
				}
			die();
		}
	}

	public function setHull ($value)
	{
		$this->_hull = $value;
	}

	public function setEngine ($value)
	{
		$this->_engine = $value;
	}

	public function setSpeed ($value)
	{
		$this->_speed = $value;
	}

	public function setManeuver ($value)
	{
		$this->_maneuver = $value;
	}

	public function setShield ($value)
	{
		$this->_shield = $value;
	}

	public function setWeapon (Weapon $value)
	{
		$this->_weapon = $value;
	}

	public function setPosition(array $value)
	{
		if (	array_key_exists("x", $value)
			&& 	array_key_exists("y", $value)
			&& 	array_key_exists("direction", $value)
			)
			$this->_position = $value;
		else
		{
			if (self::$verbose)
				{
					echo "Error : Bad position : ".PHP_EOL;
					self::doc();
				}
			die();
		}

	}

	public function setPlayer($value)
	{
		$this->_player = $value;
	}

	public function asPlay()
	{
		$this->_played = TRUE;
	}

	public function newRound()
	{
		$this->_played = FALSE;
	}
}

?>