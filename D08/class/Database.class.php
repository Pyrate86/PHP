<?php

abstract Class Database {

/*###########################################################################\
|#		Attribute															#|
\###########################################################################*/

	private static $db;

/*###########################################################################\
|#		Methodes statics													#|
\###########################################################################*/
	public static function doc()
	{
		$fp = fopen ("class/doc/".get_class().".doc.txt", "r");
		while ($doc = fgets ($fp))
			echo $doc;
		echo PHP_EOL;
		fclose ($fp);
	}

	public static function getShip($name)
	{
		$req = self::$db->prepare("SELECT * FROM ship WHERE type = ?");
		$req->execute(array($name));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

	public static function connect()
	{
		try{
			self::$db = new PDO('mysql:host=local.42.fr;dbname=rush01', 'root', 'spoing');
			self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e) {
		        die('Erreur : '.$e->getMessage());
		}
	}

}

?>