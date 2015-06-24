<?php

Class Vertex {

/*###########################################################################\
|#		Attribute															#|
\###########################################################################*/

	private $_w = 1.00;
	private $_x;
	private $_y;
	private $_z;
	private $_color;

	public static $verbose = FALSE;

/*---------------------------------------------------------------------------\
||		CONST && DEST														||
\---------------------------------------------------------------------------*/

	public function __construct(array $kwargs)
	{
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];

		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];

		if (array_key_exists('color', $kwargs))
			$this->_color = clone $kwargs['color'];
		else
			$this->_color = new Color(array('rgb' => 0xFFFFFF));
		
		if (self::$verbose)
			echo $this." constructed".PHP_EOL;
	}

	public function __destruct()
	{
			if (self::$verbose)
				echo $this." destructed".PHP_EOL;
	}

/****************************************************************************\
|*		Public methods																*|
\****************************************************************************/

	public function __toString()
	{
		$str = "Vertex( x: ";
		$str .= number_format($this->getX(), 2);
		$str .= ", y: ";
		$str .= number_format($this->getY(), 2);
		$str .= ", z:";
		$str .= number_format($this->getZ(), 2);
		$str .= ", w:";
		$str .= number_format($this->getW(), 2);
		if (self::$verbose)
		{
			$str .= ", ";
			$str .= $this->getColor();
		}
		$str .= " )";
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
		$fp = fopen (get_class().".doc.txt", "r");
		while ($doc = fgets ($fp))
			echo $doc;
		echo PHP_EOL;
		fclose ($fp);
	}

/*////////////////////////////////////////////////////////////////////////////
//		GETTERS																//
////////////////////////////////////////////////////////////////////////////*/

	public function getW ()
	{
		return $this->_w;
	}

	public function getX ()
	{
		return $this->_x;
	}

	public function getY ()
	{
		return $this->_y;
	}

	public function getZ ()
	{
		return $this->_z;
	}

	public function getColor ()
	{
		return $this->_color;
	}

/*\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
\\		SETTERS																\\
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\*/

	public function setW ($w)
	{
		$this->_w = $w;
	}

	public function setX ($x)
	{
		$this->_x = $x;
	}

	public function setY ($y)
	{
		$this->_y = $y;
	}

	public function setZ ($z)
	{
		$this->_z = $z;
	}

	public function setColor (Color $color)
	{
		$this->_color = $color;
	}

}

?>