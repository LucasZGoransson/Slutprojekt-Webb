<?php
	else
		{
			$status = 1;
			$sql = "INSERT INTO orders (orderID, produktID, antal, kundID) VALUE (?,?,?,?)";
			
			$res = $dbh -> prepare($sql);
			$res -> bind_param("sssi", $username, $email, $psw, $status);
			$res -> execute();
			
			if(!$res)
			{
				echo "Felaktig sql-fråga";
				exit(1);
			}
			
			header("location:Produkter.php");
			
			mysqli_close($dbh);
		}
	}
	
	else
	{
		header("location:ProduktBRespons.php");
	}
?>