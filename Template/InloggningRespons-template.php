<?php
if(isset($_POST['username']) && isset($_POST['psw']))
	{
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		
		require "connect.php";
		$sql = "SELECT * FROM users WHERE anvnamn = ?";
		$res = $dbh -> prepare($sql);
		$res -> bind_param("s", $username);
		$res -> execute();
		$result = $res -> get_result();
		$row = $result -> fetch_assoc();
		
		if(!$row)
		{
			//Användaren finns inte
		}
		else{
			//Användaren finns i databasen
			
			if($psw==$row['password']){
				//Lösenordet korrekt
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['status']=$row['status'];
				header("Location:index.php");
			}
			else{
				//Felaktigt lösenord
			}
		}
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