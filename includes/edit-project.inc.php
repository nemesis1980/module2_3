<?php
session_start();
// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.

include '../dbcon.php';

// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.

$pid = (isset($_POST['pid']) ? $_POST['pid'] : null);
$PName = (isset($_POST['PName']) ? $_POST['PName'] : null);
$PDesc = (isset($_POST['PDesc']) ? $_POST['PDesc'] : null);
$PStart = (isset($_POST['PStart']) ? $_POST['PStart'] : null);
$PEnd = (isset($_POST['PEnd']) ? $_POST['PEnd'] : null);

// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.

if (empty($PName)) {
	header("Location: ../edit-project.php?error=empty");
	exit();
}

if (empty($PDesc)) {
	header("Location: ../edit-project.php?error=empty");
	exit();
}

if (empty($PStart)) {
	header("Location: ../edit-project.php?error=empty");
	exit();
}

if (empty($PEnd)) {
	header("Location: ../edit-project.php?error=empty");
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
		header("Location: ../edit-project.php?error=projectname");
		exit();
	}
	else {
		$sql = "UPDATE Project SET Project_Name='$PName', Project_Description='$PDesc', Project_Startdate='$PStart', Project_Enddate='$PEnd' WHERE pid='$pid'";
		$conn->query($sql);

/*		if (mysqli_query($conn, $sql)) {
    		echo "Record updated successfully";
		} else {
    		echo "Error updating record: " . mysqli_error($conn);
		}
*/	}

	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.

	header("Location: ../projects.php");

?>
