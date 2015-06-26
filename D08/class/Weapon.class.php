<?php

Class Weapon {

/*###########################################################################\
|#		Attribute															#|
\###########################################################################*/

	public static $verbose = FALSE;

	private $_name;
	private $_charges;
	private $_scope;
	private $_effect;

/*---------------------------------------------------------------------------\
||		CONST && DEST														||
\---------------------------------------------------------------------------*/

	public function __construct(array $kwargs)
	{

		$this->setName($kwargs['name']);

		$this->setCharges($kwargs['charges']);

		$this->setScope($kwargs['scope']);

		$this->setEffect($kwargs['effect']);

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

	public function __toString()
	{
		$scope = $this->getScope();

		$str = $this->getName();
		$str .= "\nCharges : ";
		$str .= $this->getCharges();
		$str .= "\nPortée courte : ";
		$str .= $scope['short']['min'];
		$str .= " à ";
		$str .= $scope['short']['max'];
		$str .= " cases\nPortée intermédiaire : ";
		$str .= $scope['inter']['min'];
		$str .= " à ";
		$str .= $scope['inter']['max'];
		$str .= " cases\nPortée longue : ";
		$str .= $scope['long']['min'];
		$str .= " à ";
		$str .= $scope['long']['max'];
		$str .= " cases\nZone d’effet : ";
		$str .= $this->getEffect.PHP_EOL;
		return $str;
	}

/*|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||\
||		Private methods																||
\|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

	private function check_scope($scope)
	{
		if (   $scope['short']['min'] > $scope['short']['max']
			|| $scope['inter']['min'] > $scope['inter']['max']
			|| $scope['long']['min'] > $scope['long']['max']
			|| $scope['short']['max'] >= $scope['inter']['min']
			|| $scope['inter']['min'] >= $scope['long']['min'])
			return (FALSE);
		return (TRUE);
	}

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

	public function getName ()
	{
		return $this->_name;
	}

	public function getCharges ()
	{
		return $this->_charges;
	}

	public function getScope ()
	{
		return $this->_scope;
	}

	public function getEffect ()
	{
		return $this->_effect;
	}

	public function getConstruct()
	{
		$str = "(";
		$str .= $this->getName();
		$str .= ", ";
		$str .= $this->getCharges();
		$str .= ", ";
		$str .= ", array('short' => array('min' => ";
		$str .= $this->getScope()['short']['min'];
		$str .= ", 'max' => ";
		$str .= $this->getScope()['short']['max'];
		$str .= "), 'inter' => array('min' => ";
		$str .= $this->getScope()['inter']['min'];
		$str .= ", 'max' => ";
		$str .= $this->getScope()['inter']['max'];
		$str .= "), 'long' => array('min' => ";
		$str .= $this->getScope()['long']['min'];
		$str .= ", 'max' => ";
		$str .= $this->getScope()['long']['max'];
		$str .= ")), ";
		$str .= $this->getEffect()->getName();
		$str .= ")";
		return $str;
	}

/*\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
\\		SETTERS																\\
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\*/

	public function setName ($value)
	{
		$this->_name = $value;
	}

	public function setCharges ($value)
	{
		if (!is_numeric($value))
		{
			if (self::$verbose)
				{
					echo "Error : Bad charges format : ".PHP_EOL;
					self::doc();
				}
			die();
		}
		$this->_charges = $value;
	}

	public function setScope (array $value)
	{
		if (!$this->check_scope($value))
		{
			if (self::$verbose)
				{
					echo "Error : Bad scope format : ".PHP_EOL;
					self::doc();
				}
				die();
			}
		$this->_scope = $value;
	}

	public function setEffect (Effect $value)
	{
		$this->_effect = $value;
	}

}

?>