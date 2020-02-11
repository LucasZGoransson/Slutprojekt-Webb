<?php
	session_start();
	
	if(!isset($_SESSION['username']))
	{
			header("Location:LoggaIn.php");
	}
	
	$namn=$_SESSION['username'];
	require "connect.php";
	
	if (isset($_POST['produktnamn']))
	{
		$produktnamn = filter_input(INPUT_POST, 'produktnamn', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$produktbeskrivning = filter_input(INPUT_POST, 'produktbeskrivning', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$produktpris = filter_input(INPUT_POST, 'produktpris', FILTER_SANITIZE_NUMBER_INT);
		
		$bild="bild.jpg";
		
		$sql = "INSERT INTO produkter(namn, beskrivning, pris, bild) VALUE (?,?,?,?)";
		
		$res = $dbh -> prepare($sql);
		$res -> bind_param("ssis", $produktnamn, $produktbeskrivning, $produktpris, $bild);
		$res -> execute();
			
		if(!$res)
		{
			echo "Felaktig sql-fråga";
			exit(1);
		}
	}
	
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
			<form action="Produkter.php" method="post">
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
			
			<br><br><br>
			
			<table>
				<tr>
					<th>Produkt:</th>
					<th>Beskrivning:</th>
					<th>Pris: (SEK)</th>
					<th>Bild:</th>
					<th>Lägg till i varukorg:
				</tr>
				
				<?php
				while($row = $result -> fetch_assoc())
				{
					$pid=$row['produktID'];
				echo "<tr><td>";
				echo $row['namn'];
				echo "</td><td>";
				echo $row['beskrivning'];
				echo "</td><td>";
				echo $row['pris'];
				echo "</td><td>";
				echo $row['bild'];
				echo "</td><td>";
				echo "<button type='button' onclick='location.href=\"ProduktBRespons.php?pid=$pid\";'>Lägg till i varukorg</button>";
				echo "</td></tr>";
				}
				?>	
			</table>
		</main>
		
		<div class="sidenav2">
		</div>

		<?php
			require "../Template/Footer.php";
		?>

	</body>
</html>