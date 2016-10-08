<?php
session_start();
// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.

	include 'dbcon.php';

//Her bliver header.php, som er vores menu, inkluderet på siden

	include 'header.php';
?>

		<H1 class="indhold_overskrift">Projekter</H1>
		<p class="indhold_text">Her kan du se dine forskellige projekter:</p>
		<br>
			<div class="projekt-form">
<?php


// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.
	if (isset($_SESSION['id'])) {

		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.

		$conn = mysqli_connect($servername, $username, $password, $table);

		$uid = $_SESSION['id'];

		$sql = "SELECT * FROM Project WHERE Client_id='$uid'";
		$result = mysqli_query($conn, $sql);

		echo "<a href='create-project.php' class='create-button'>Opret nyt projekt</a>"; echo "<a href='edit-project.php' class='create-button'>Rediger i eksisterende projekt</a><br><br>";
			while ($row = $result->fetch_assoc()) {
				echo "<p>Projekt Navn:" . " " . $row['Project_Name'] . "</p>
					<p>Projekt Beskrivelse:" . " " . $row['Project_Description'] . "</p>
					<p>Projekt Startdato:" . " " . $row['Project_Startdate'] . "</p>
					<p>Projekt Slutdato:" . " " . $row['Project_Enddate'] . "</p>
					<br><br>";
			}
	} 
	else {
		echo "Du skal være logget ind for at kunne oprette eller ændre i projekter.";
	}

?>

			</div>


</body>
</html>
