<?php
	session_start();
	
	if(!isset($_SESSION['username']))
	{
			header("Location:LoggaIn.php");
	}
	
	$namn=$_SESSION['username'];
	require "connect.php";

	if(isset($_GET["pid"]))
		{
			$antal = 1;
			$produktID=$_GET['pid'];
			
			$sql="SELECT kundID FROM kunder WHERE anvnamn=?";
			$res = $dbh -> prepare($sql);
			$res -> bind_param("s", $namn);
			$res -> execute();
			$result = $res -> get_result();
			$row = $result -> fetch_assoc();
			$kundID=$row['kundID'];
			
			$sql = "INSERT INTO orders ( produktID, antal, kundID) VALUE (?,?,?)";
			
			$res = $dbh -> prepare($sql);
			$res -> bind_param("iii", $produktID, $antal, $kundID);
			$res -> execute();
			
			if(!$res)
			{
				echo "Felaktig sql-fråga";
				exit(1);
			}
			
			header("location:Produkter.php");
			
			mysqli_close($dbh);
		}
	
	
	else
	{
		header("location:Produkter.php");
	}
?>