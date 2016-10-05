<?php

$servername = "localhost";
$username = "slackdk_webdb_admin";
$password = "Abel1980";
$table = "slackdk_webdb";

// Nedenfor er login info til databasen, som bliver gemt i en variabel der hedder $conn.

$conn = mysqli_connect($servername, $username, $password, $table);

// Nedenfor bliver der testet om forbindelsen til databasen er i orden, og ellers bliver der sendt en fejlbesked tilbage

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
