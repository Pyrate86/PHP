<?php

Class Vector {

/*###########################################################################\
|#		Attribute															#|
\###########################################################################*/

	public static $verbose = FALSE;

	private $_w;
	private $_x;
	private $_y;
	private $_z;

/*---------------------------------------------------------------------------\
||		CONST && DEST														||
\---------------------------------------------------------------------------*/

	public function __construct(array $kwargs)
	{
		if (array_key_exists('orig', $kwargs))
			$orig = clone $kwargs['orig'];
		else
			$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));

		$this->_x = $kwargs['dest']->getX() - $orig->getX();
		$this->_y = $kwargs['dest']->getY() - $orig->getY();
		$this->_z = $kwargs['dest']->getZ() - $orig->getZ();
		$this->_w = 0;		

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

	public function magnitude()
	{
		return sqrt(
			pow($this->getX(), 2)
			+
			pow($this->getY(), 2)
			+ 
			pow($this->getZ(), 2)
			);
	}

	public function normalize()
	{
		$mag = $this->magnitude() == 0 ? 1 : $this->magnitude();

		$x =  $this->getX() / $mag;
		$y =  $this->getY() / $mag;
		$z =  $this->getZ() / $mag;
		$vert = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		$norm = new Vector(array('dest' => $vert));

		return $norm;
	}

	public function add(Vector $rhs)
	{
		$x = $this->getX() + $rhs->getX();
		$y = $this->getY() + $rhs->getY();
		$z = $this->getZ() + $rhs->getZ();
		$vert = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		return new Vector(array('dest' => $vert));
	}

	public function sub(Vector $rhs)
	{
		$x = $this->getX() - $rhs->getX();
		$y = $this->getY() - $rhs->getY();
		$z = $this->getZ() - $rhs->getZ();
		$vert = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		return new Vector(array('dest' => $vert));
	}

	public function opposite()
	{
		$vert = new Vertex(array(
			'x' => -($this->getX()),
			'y' => -($this->getY()),
			'z' => -($this->getZ())
			));
		return new Vector(array('dest' => $vert));
	}

	public function scalarProduct($k)
	{
		$vert = new Vertex(array(
			'x' => $this->getX() * $k,
			'y' => $this->getY() * $k,
			'z' => $this->getZ() * $k
			));
		return new Vector(array('dest' => $vert));
	}

	public function dotProduct(Vector $rhs)
	{
		$x = $this->getX() * $rhs->getX();
		$y = $this->getY() * $rhs->getY();
		$z = $this->getZ() * $rhs->getZ();
		return $x + $y + $z;		
	}

	public function crossProduct(Vector $rhs)
	{

		$x = ($this->getY() * $rhs->getZ()) - ($this->getZ() * $rhs->getY());
		$y = ($this->getZ() * $rhs->getX()) - ($this->getX() * $rhs->getZ());
		$z = ($this->getX() * $rhs->getY()) - ($this->getY() * $rhs->getX());
		$vert = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		return new Vector(array('dest' => $vert));

	}

	public function cos(Vector $rhs)
	{
		return $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());

	}

	public function __toString()
	{
		$str = "Vector( x:";
		$str .= number_format($this->getX(), 2, '.', '');
		$str .= ", y:";
		$str .= number_format($this->getY(), 2, '.', '');
		$str .= ", z:";
		$str .= number_format($this->getZ(), 2, '.', '');
		$str .= ", w:";
		$str .= number_format($this->getW(), 2, '.', '');
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
}
?>