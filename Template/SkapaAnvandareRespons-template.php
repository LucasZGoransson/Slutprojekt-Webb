<?php
if(isset($_POST['username']) && isset($_POST['psw']) && isset($_POST['fname']) && isset($_POST['lname'])
	&& isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['address']) && isset($_POST['city']) 
	&& isset($_POST['zipcode']) && isset($_POST['gender']))
	{
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$fnamn = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$lnamn = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
		$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		
		require "connect.php";
		$sql = "SELECT * FROM users WHERE anvnamn = ? OR email = ?";
		$res = $dbh -> prepare($sql);
		$res -> bind_param("ss", $username, $email);
		$res -> execute();
		$result = $res -> get_result();
		$row = $result -> fetch_assoc();
		
		if($row !== NULL)
		{
			if($row['anvnamn'] === $username)
			{
				header("location:SkapaAnvandare.php?name=$username");
			}
			
			elseif($row['email'] === $email)
			{
				header("location:SkapaAnvandare.php?name=$email");
			}
		}
		
		else
		{
			$status = 1;
			$sql = "INSERT INTO users(anvnamn, email, password, status) VALUE (?,?,?,?)";
			var_dump($res);
			$res = $dbh -> prepare($sql);
			$res -> bind_param("sssi", $username, $email, $psw, $status);
			$res -> execute();
			
			if(!$res)
			{
				echo "Felaktig sql-fråga";
				exit(1);
			}
			
			$sql = "INSERT INTO kunder(anvnamn, fornamn, efternamn, adress, postnummer, postadress, telefon) VALUE (?,?,?,?,?,?,?)";
			$res = $dbh -> prepare($sql);
			$res -> bind_param("ssssiss", $username, $fnamn, $lnamn, $address, $zipcode, $city, $phonenumber);
			$res -> execute();
			
			if(!$res)
			{
				echo "Felaktig sql-fråga";
				exit(1);
			}
			
			header("location:LoggaIn.php");
			
			mysqli_close($dbh);
		}
	}
	
	else
	{
		header("location:SkapaAnvandare.php");
	}
?>