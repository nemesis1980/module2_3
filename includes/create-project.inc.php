<?php
session_start();
// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.

include '../dbcon.php';

// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.

$PName = $_POST['PName'];
$PDesc = $_POST['PDesc'];
$PStart = $_POST['PStart'];
$PEnd = $_POST['PEnd'];
$CID = $_SESSION['id'];

// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.

if (empty($PName)) {
	header("Location: ../create-project.php?error=empty");
	exit();
}

if (empty($PDesc)) {
	header("Location: ../create-project.php?error=empty");
	exit();
}

if (empty($PStart)) {
	header("Location: ../create-project.php?error=empty");
	exit();
}

if (empty($PEnd)) {
	header("Location: ../create-project.php?error=empty");
	exit();
}


/*
Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.
Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.
*/

	$conn = mysqli_connect($servername, $username, $password, $table);

	$sql = "SELECT Project_Name FROM Project WHERE Project_Name='$PName'";
	$result = mysqli_query($conn, $sql);
	$pnamecheck = mysqli_num_rows($result);

	if ($pnamecheck > 0) {
		header("Location: ../create-project.php?error=projectname");
		exit();
	}
	else {
		$sql = "INSERT INTO slackdk_webdb.Project (Project_Name, Project_Description, Project_Startdate, Project_Enddate, Client_id)
				VALUES ('$PName', '$PDesc', '$PStart', '$PEnd', '$CID')";
		$result = mysqli_query($conn, $sql);
	}

	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.

	header("Location: ../projects.php");

?>
