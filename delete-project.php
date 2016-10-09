<?php
session_start();
// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.

	include 'dbcon.php';

//Her bliver header.php, som er vores menu, inkluderet på siden

	include 'header.php';
?>

<div class="delete-box">
	<?php


	// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.
		if (isset($_SESSION['id'])) {

			// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.

			$conn = mysqli_connect($servername, $username, $password, $table);

			$pid = $_POST['pid'];

			$sql = "SELECT * FROM Project WHERE pid='$pid'";
			$result = mysqli_query($conn, $sql);

			while ($row = $result->fetch_assoc()) {
				echo "<div class='project-box'><p>Projekt id:" . " " . $row['pid'] . "</p>
					<p>Projekt Navn:" . " " . $row['Project_Name'] . "</p>
					<p>Projekt Beskrivelse:" . " " . $row['Project_Description'] . "</p>
					<p>Projekt Startdato:" . " " . $row['Project_Startdate'] . "</p>
					<p>Projekt Slutdato:" . " " . $row['Project_Enddate'] . "</p>
					<br><br>
					<p>Er du sikker på at du vil slette dette projekt?</p>
					<form class ='register' action='includes/delete-project.inc.php' method='POST'>
					<input type='hidden' name='pid' value='".$_POST['pid']."'>
					<button>Ja, Slet projektet</button>
					</form>
					</div>
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