<?php

	$db = mysqli_connect("local.42.fr", "root", "spoing", "rush00");

if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

?>
