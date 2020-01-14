<!DOCTYPE html>
<html lang="sv">
	<head>
		<title>Skapa användare</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="Slutprojekt.css" rel="stylesheet">
	</head>

	<body>
		<?php
			require "../Template/Nav.php";
		?>


		<main role="main">
			<form action="SkapaAnvandareRespons.php" method="post">
				<fieldset>
					<legend>Skapa användare:</legend><br>
		
					<label for="username">Användarnamn:</label><br>
					<input type="username" name="username" required><br>
		
					<label for="password">Lösenord:</label><br>
					<input type="password" name="psw" required><br><br><br><br>
					
					
					
					<label for="fname">Förnamn:</label><br>
					<input type="text" name="fname" required><br>
		
					<label for="lname">Efternamn:</label><br>
					<input type="text" name="lname" required><br><br><br><br>
		
		
		
					<label for="email">E-post:</label><br>
					<input type="email" name="email" required><br><br>
		
					<label for="phonenumber">Telefonnummer:</label><br>
					<input type="text" name="phonenumber" required><br><br><br><br>
		
		
		
					<label for="address">Adress:</label><br>
					<input type="text" name="address" required><br><br>
	
					<label for="city">Ort:</label><br>
					<input type="text" name="city" required><br><br>
			
					<label for="Zipcode">Postnummer:</label><br>
					<input type="text" name="zipcode" required><br><br><br><br>
		
					<label for="Gender">Kön:</label><br>
					<select name="gender">
					<option value="male">Man</option>
					<option value="female">Kvinna</option>
					<option value="other">Annat</option>
		
					<input type="submit" value="Skicka">
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