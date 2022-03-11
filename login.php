<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$sql = "SELECT * FROM klienci WHERE login = '$login' AND haslo='$haslo'";
		
		if($rezultat = $polaczenie->query($sql))
		{
			$ilu_klientow = $rezultat->num_rows;
			if($ilu_klientow>0)
			{
				
				$_SESSION['zalogowany'] = true;
				
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['imie']." ".$wiersz['nazwisko'];
				
				
				
				unset($_SESSION['blad']);
				$rezultat->close();
				header('Location:sklep.php');
				
				
			}
			else
			{
				
				$_SESSION['blad'] = '<span style= "color:red">Nieprawidlowy login lub haslo!</span>';
				header('Location:index.php');
				
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>