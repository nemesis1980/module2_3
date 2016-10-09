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

		echo "<a href='create-project.php' class='create-button'>Opret nyt projekt</a><br><br>";
			while ($row = $result->fetch_assoc()) {
				echo "<div class='project-box'><p>Projekt id:" . " " . $row['pid'] . "</p>
					<p>Projekt Navn:" . " " . $row['Project_Name'] . "</p>
					<p>Projekt Beskrivelse:" . " " . $row['Project_Description'] . "</p>
					<p>Projekt Startdato:" . " " . $row['Project_Startdate'] . "</p>
					<p>Projekt Slutdato:" . " " . $row['Project_Enddate'] . "</p>
					<form class='edit-form' method='POST' action='edit-project.php'>
						<input type='hidden' name='pid' value='".$row['pid']."'>
						<input type='hidden' name='Project_Name' value='".$row['Project_Name']."'>
						<input type='hidden' name='Project_Description' value='".$row['Project_Description']."'>
						<input type='hidden' name='Project_Startdate' value='".$row['Project_Startdate']."'>
						<input type='hidden' name='Project_Enddate' value='".$row['Project_Enddate']."'>
						<button>Rediger</button>
					</form>
					<form class='delete-form' method='POST' action='delete-project.php'>
						<input type='hidden' name='pid' value='".$row['pid']."'>
						<input type='hidden' name='Project_Name' value='".$row['Project_Name']."'>
						<input type='hidden' name='Project_Description' value='".$row['Project_Description']."'>
						<input type='hidden' name='Project_Startdate' value='".$row['Project_Startdate']."'>
						<input type='hidden' name='Project_Enddate' value='".$row['Project_Enddate']."'>
						<button>Slet</button>
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
