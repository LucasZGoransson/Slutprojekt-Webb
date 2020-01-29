<?php
	session_start();
	
	if(isset($_SESSION['username'])){
		$namn=$_SESSION['username'];
	}
	
	require "connect.php";
		$sql = "SELECT * FROM produkter";
		$res = $dbh -> prepare($sql);
		$res -> execute();
		$result = $res -> get_result();
		$dbh -> close();
?>

<!DOCTYPE html>
<html lang="sv">
	<head>
		<title>Hem</title>
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
					<legend>Lägg till produkter:</legend><br>
			
					<label for="Namn">Namn på produkt:</label><br>
					<input type="text" name="produktnamn" id="Namn" required><br>
		
					<label for="Beskrivning">Beskrivning:</label><br>
					<input type="text" name="produktbeskrivning" id="Beskrivning" required><br>
					
					<label for="Pris">Pris: (SEK)</label><br>
					<input type="text" name="produktpris" id="Pris" required><br>
		
					<input type="submit" value="Lägg till">

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