<?php require_once("test.php"); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	
	<div class="player player_1">
		Player 1 Fleet
		<hr>
		<?php
			foreach ($fleet as $ship) {
				if ($ship->getPlayer() == 1)
				{
					echo "<span";
					if ($ship->playable())
						echo " class =\"played\" >".$ship->getName()."</span><br \>";
					else
						echo "><a href=\"#\" class=\"playable\">".$ship->getName()."</a></span><br \>";
				}
			}
		?>
	</div>
	<div class="active_ship">To play<hr></div>
	<div class="player player_2">
		Player 2 Fleet
		<hr>
		<?php
			foreach ($fleet as $ship) {
				if ($ship->getPlayer() == 2)
				{
				{
					echo "<span";
					if ($ship->playable())
						echo " class =\"played\" >".$ship->getName()."</span><br \>";
					else
						echo "><a href=\"#\" class=\"playable\">".$ship->getName()."</a></span><br \>";
				}
				}
			}
		?>
	</div>

	<?php

		echo "<table>".PHP_EOL;
		for($i = 0; $i < 100; $i++)
		{
			echo "<tr>".PHP_EOL;
			for($j = 0; $j < 150; $j++)
			{
				$asShip = FALSE;
				$color = "empty";
				$direction = "o";
				echo "<td class=\"cell ";
					foreach ($fleet as $ship) {
						if ($i == $ship->getPosition()['y']
							&& $j == $ship->getPosition()['x'])
						{
							$asShip = TRUE;
							$name = $ship->getName();
							$color = $ship->getPlayer() == 1 ? "fleet_1" : "fleet_2";
							$direction = Direction::drawDirection($ship->getPosition()['direction']);

						}
					}
				echo $color."\">";
				echo $direction;
				echo "</td>".PHP_EOL;
			}
			echo "</tr>".PHP_EOL;
		}
		echo "</table>".PHP_EOL;
	?>


	</body>
</html>