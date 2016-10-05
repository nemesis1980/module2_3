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
	elseif(strpos($url, 'error=username') !==false) {
		echo "Brugernavn eksisterer allerede <br><br>";
	}

// Her tjekkes der om man er logget ind i systemet

	if (isset($_SESSION['id'])) {
	} else {
		echo "Du er ikke logget ind";
	}
?>

<br><br><br>

<?php

// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.
	if (isset($_SESSION['id'])) {
		echo "Du er allerede logget ind";
	} else {
		echo "<form class ='register' action='includes/signup.inc.php' method='POST'>
			<input type='text' name='Name' placeholder='Navn'><br>
			<input type='text' name='Adress' placeholder='Adresse'><br>
			<input type='text' name='Contact' placeholder='Kontakt navn'><br>
			<input type='text' name='Phone' placeholder='Telefonnummer'><br>
			<input type='text' name='Zipcode_Zipcode' placeholder='Postnummer'><br>
			<input type='text' name='uid' placeholder='Brugernavn'><br>
			<input type='password' name='pwd' placeholder='Password'><br>
			<button type='submit'>Registrer</button>
		</form>";
	}
?>
</body>
</html>