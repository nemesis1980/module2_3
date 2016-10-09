<?php
session_start();
// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.

include '../dbcon.php';

// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.

$pid = (isset($_POST['pid']) ? $_POST['pid'] : null);

	$conn = mysqli_connect($servername, $username, $password, $table);

	$sql = "SELECT Project_Name FROM Project WHERE Project_Name='$PName'";
	$result = mysqli_query($conn, $sql);
	$pnamecheck = mysqli_num_rows($result);

	if ($pnamecheck > 0) {
		header("Location: ../edit-project.php?error=projectname");
		exit();
	}
	else {
		$sql = "DELETE FROM Project WHERE pid='$pid'";
		$conn->query($sql);

		if (mysqli_query($conn, $sql)) {
    		echo "Record updated successfully";
    		echo $pid;
		} else {
    		echo "Error updating record: " . mysqli_error($conn);
		}
	}

	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.

//	header("Location: ../projects.php");

?>
