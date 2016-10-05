<?php
	session_start();
	// Vi starter en session her.
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login System</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
<nav>
	<ul class="ulleft">
		<li><a href="index.php">HJEM</a></li>
		<li><a href="about.php">OM OS</a></li>
		<li><a href="profile.php">PROFIL</a></li>
		<li><a href="projects.php">PROJEKTER</a></li>		
	</ul>
	<ul class="ulright">
		<?php
		
// Her tjekker vi efter om der er en eksisterende session, altså om brugeren er logget ind, og hvis dette er sandt, så laves en logout knap.
		if (isset($_SESSION['id'])) {
			echo "<form action='includes/logout.inc.php'>
				<button>Log ud</button>
			</form>";
		} 
// Hvis brugeren ikke er logget ind, laves en form, hvor brugeren kan logge ind.
		else {
			echo "<form action='includes/login.inc.php' method='POST'>
				<input type='text' name='uid' placeholder='Brugernavn'>
				<input type='password' name='pwd' placeholder='Password'>
				<button type='submit'>Login</button>
			</form>";
		}
		?>
		<li><a href="signup.php">Registrer</a></li>
	</ul>
</nav>
</header>