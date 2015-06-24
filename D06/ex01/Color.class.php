<?php
Class Color {
	
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public static $verbose = FALSE;

	public function __construct( array $kwargs)
	{
		if (array_key_exists('rgb', $kwargs))
		{
			$this->red = (int)($kwargs['rgb'] >> 16);
			$this->green = (int)($kwargs['rgb'] - ($this->red << 16) >> 8);
			$this->blue = (int)($kwargs['rgb'] - ($this->red << 16) - ($this->green << 8));
		}
		else
		{
			if (array_key_exists('red', $kwargs))
				$this->red = (int)$kwargs['red'];
			if (array_key_exists('green', $kwargs))
				$this->green = (int)$kwargs['green'];
			if (array_key_exists('blue', $kwargs))
				$this->blue = (int)$kwargs['blue'];
		}
			if (self::$verbose)
				echo $this." constructed.".PHP_EOL;
	}

	public function __destruct()
	{
			if (self::$verbose)
				echo $this." destructed.".PHP_EOL;
	}

	public function __toString()
	{
		$str = "Color( red:";
		$str .= $this->_aligned($this->red);
		$str .=  ", green:";
		$str .= $this->_aligned($this->green);
		$str .=  ", blue:";
		$str .= $this->_aligned($this->blue);
		$str .=  " )";
		return $str;
	}

	public function add(Color $c2)
	{
		$args = array(
			'red' => $this->red + $c2->red,
			'green' => $this->green + $c2->green,
			'blue' => $this->blue + $c2->blue);
		$new_color = new Color($args);
		return $new_color;
	}

	public function sub(Color $c2)
	{
		$args = array(
			'red' => $this->red - $c2->red,
			'green' => $this->green - $c2->green,
			'blue' => $this->blue - $c2->blue);
		$new_color = new Color($args);
		return $new_color;
	}

	public function mult($facteur)
	{
		$args = array(
			'red' => $this->red * $facteur,
			'green' => $this->green * $facteur,
			'blue' => $this->blue * $facteur);
		$new_color = new Color($args);
		return $new_color;
	}


	private function _aligned($str)
	{
		$tmp = "";
		$spc = 4 - strlen($str);
		while ($spc)
		{
			$tmp .= " ";
			$spc--;
		}
		$tmp .=$str;
		return $tmp;
	}

	public static function doc()
	{
		$fp = fopen (get_class().".doc.txt", "r");
		while ($doc = fgets ($fp))
			echo $doc;
		echo PHP_EOL;
		fclose ($fp);
	}
}

?>