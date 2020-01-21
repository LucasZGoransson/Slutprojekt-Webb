<!DOCTYPE html>
<html lang="sv">
	<head>
		<title>Logga in</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="Slutprojekt.css" rel="stylesheet">
	</head>

	<body>
		<?php
			require "../Template/Nav.php";
		?>


		<main role="main">
			<form action="InloggningRespons.php" method="post">
				<fieldset>
					<legend>Skapa användare:</legend><br>
			
					<label for="username">Användarnamn:</label><br>
					<input type="username" name="username" required><br>
		
					<label for="password">Lösenord:</label><br>
					<input type="password" name="psw" required><br><br>
		
					<input type="submit" value="Skicka">
		
					<button type="button" onclick="location.href='SkapaAnvandare.php';">Skapa användare</button>
			
				</fieldset>
			</form>			 	
		</main>

		<div class="sidenav2">
		</div>

		<?php
			require "../Template/Footer.php";
		?>

	</body>
</html>