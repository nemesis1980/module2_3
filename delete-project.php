<?php
	include 'header.php';
	//Her bliver header.php, som er vores menu, inkluderet på siden
?>

<?php

// Her bliver der tjekket, om der er en fejl på siden, og efterfølgende fortalt brugeren at de enten skal udfylde alle felter eller at brugernavnet allerede eksisterer.

	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if(strpos($url, 'error=empty') !==false) {
		echo "Udfyld alle felter <br><br><br>";
	}
	
/*
	elseif(strpos($url, 'error=projectname') !==false) {
		echo "Projekt navn eksisterer allerede <br><br>";
	}
*/
// Her tjekkes der om man er logget ind i systemet

	if (isset($_SESSION['id'])) {
	} else {
		echo "Du er ikke logget ind";
	}
?>

<br><br><br>

<?php


// Her tjekkes først om man er logget ind og ellers kommer projekt oprettelses formen frem, så man kan oprette et projekt.
	if (isset($_SESSION['id'])) {
//		echo $_POST['pid'];
		echo "<form class='register' action='includes/edit-project.inc.php' method='POST'>
			<input type='hidden' name='pid' value='".$_POST['pid']."'>
			<input type='text' name='PName' value='".$_POST['Project_Name']."'><br>
			<input type='text' name='PDesc' value='".$_POST['Project_Description']."'><br>
			<input type='text' name='PStart' value='".$_POST['Project_Startdate']."'><br>
			<input type='text' name='PEnd' value='".$_POST['Project_Enddate']."'><br>
			<button type='submit'>Gem Projekt</button>
		</form>";
	}
?>
</body>
</html>