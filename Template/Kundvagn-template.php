<?php
	session_start();
	
	if(!isset($_SESSION['username']))
	{
			header("Location:LoggaIn.php");
	}
	
	$namn=$_SESSION['username'];
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
			<table>
					<tr>
						<th>Produkt:</th>
						<th>Beskrivning:</th>
						<th>Pris: (SEK)</th>
						<th>Bild:</th>
						<th>Ta bort produkt:</th>
					</tr>

				<?php
				
					while($row = $result -> fetch_assoc()){
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
					echo "<button type='button' onclick='location.href=\"ProduktBRespons.php?pid=$pid\";'>Ta bort</button>";
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