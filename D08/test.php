<?php

	require_once("class/Database.class.php");
	Database::connect();

	require_once("class/Ship.class.php");
	require_once("class/Frigate.class.php");
	require_once("class/Destroyer.class.php");

	require_once("class/Weapon.class.php");

	require_once("class/Effect.class.php");

	require_once("class/Direction.class.php");


// Database::doc();
// Ship::doc();
// Frigate::doc();
// Destroyer::doc();
// Weapon::doc();
// Effect::doc();
// Direction::doc();

// Weapon::$verbose = True;

// Ship::$verbose = True;

	$name = "Batteries laser de flancs";
	$charges = 0;
	$scope = array(
			'short' => array('min' => 1, 'max' => 10),
			'inter' => array('min' => 11, 'max' => 20),
			'long' => array('min' => 21, 'max' => 30)
			);
	$effect = new Effect($scope);

	$weapon = array(
					'name' => $name,
					'charges' => $charges,
					'scope' => $scope,
					'effect' => $effect
					);


	$one_f = new Frigate(array(
						'name' => "Honorable Duty",
						'weapon' => new Weapon($weapon),
						'position' => array('x' => 0, 'y' => 0, 'direction' => Direction::NORTH),
						'player' => 1
						));
	$two_f = new Frigate(array(
						'name' => "Honorable Duty MKII",
						'weapon' => new Weapon($weapon),
						'position' => array('x' => 10, 'y' => 10, 'direction' => Direction::EAST),
						'player' => 2
						));

	$one_d = new Destroyer(array(
						'name' => "Sword Of Absolution",
						'weapon' => new Weapon($weapon),
						'position' => array('x' => 20, 'y' => 20, 'direction' => Direction::SOUTH),
						'player' => 1
						));

	$two_d = new Destroyer(array(
						'name' => "Cave Imperium",
						'weapon' => new Weapon($weapon),
						'position' => array('x' => 99, 'y' => 99, 'direction' => Direction::WEST),
						'player' => 2
						));

	$one_d->asPlay();
	$two_f->asPlay();

	$fleet = array();
	array_push($fleet, $one_f);
	array_push($fleet, $one_d);
	array_push($fleet, $two_f);
	array_push($fleet, $two_d);


	// print("########".PHP_EOL);
	// print($s);
	// print("########".PHP_EOL);
	// print($s2);
	// print("########".PHP_EOL);
	// print($s3);
	// print("########".PHP_EOL);
	// print($s4);
	// print("########".PHP_EOL);


?>