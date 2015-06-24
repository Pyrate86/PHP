<?php

Class Lannister {

	protected function sleepFamily() {
		return TRUE;
	}

	public function sleepWith($character) {

		if ($character instanceof Lannister)
		{
			if (static::sleepFamily() && $character->sleepFamily())
				echo "With pleasure, but only in a tower in Winterfell, then.".PHP_EOL;
			else
				echo "Not even if I'm drunk !".PHP_EOL;
		}
		else
			echo "Let's do this.".PHP_EOL;

	}

}

?>