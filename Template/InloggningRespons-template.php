<?php
if(isset($_POST['username']) && isset($_POST['psw']
	{
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		
		require "connect.php";
		$sql = "SELECT * FROM users WHERE anvnamn = ? OR email = ?";
		$res = $dbh -> prepare($sql);
		$res -> bind_param("s", $username);
		$res -> execute();
		$result = $res -> get_result();
		$row = $result -> fetch_assoc();
		
		if(!$row)
		{
			
		}
?>

<!DOCTYPE html>
<html lang="sv">
	<head>
		<title>Respons</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="Slutprojekt.css" rel="stylesheet">
	</head>

	<body>
		<?php
			require "../Template/Nav.php";
		?>


		<main role="main">

		</main>


		<div class="sidenav2"></div>
		
		<?php
			require "../Template/Footer.php";
		?>

	</body>
</html>