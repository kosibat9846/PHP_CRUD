<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		
		$OK=true;
		
		
		$login = $_POST['login'];
		
		if ((strlen($login)<3) || (strlen($login)>15))
		{
			$OK=false;
			$_SESSION['error_login']="Nick musi posiadać od 3 do 15 znaków!";
		}
		
		
		if (ctype_alnum($login)==false)
		{
			$OK=false;
			$_SESSION['error_login']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		
		
		
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$OK=false;
			$_SESSION['error_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$OK=false;
			$_SESSION['error_haslo']="Podane hasła nie są identyczne!";
		
		
		}
		
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$OK=false;
			$_SESSION['error_email']="Podaj poprawny adres e-mail!";
		}
	
		$imie = $_POST['imie'];
		
		if ((strlen($imie)<2) || (strlen($imie)>15))
		{
			$OK=false;
			$_SESSION['error_imie']="Imie musi posiadać od 3 do 15 znaków!";
		}
		
		
		
		$nazwisko = $_POST['nazwisko'];
		
		if ((strlen($nazwisko)<2) || (strlen($nazwisko)>15))
		{
			$OK=false;
			$_SESSION['error_nazwisko']="Nazwisko musi posiadać od 2 do 15 znaków!";
		}
		
		$miejscowosc = $_POST['miejscowosc'];
		
			if ((strlen($miejscowosc)<2) || (strlen($miejscowosc)>15))
		{
			$OK=false;
			$_SESSION['error_miejscowosc']="Miejscowosc musi posiadać od 2 do 15 znaków!";
		}
		
		
		$kod_pocztowy = $_POST['kod_pocztowy'];
		
		$ulica = $_POST['ulica'];
		
		$nr_mieszkania= $_POST['nr_mieszkania'];
		
		$telefon = $_POST['telefon'];
		
		
		
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{	
				
				$rezultat = $polaczenie->query("SELECT id_klienta FROM klienci WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$OK=false;
					$_SESSION['error_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				
				$rezultat = $polaczenie->query("SELECT id_klienta FROM klienci WHERE login='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_loginow = $rezultat->num_rows;
				if($ile_takich_loginow>0)
				{
					$OK=false;
					$_SESSION['error_login']="Istnieje już uzytkownik o takim Loginie! Wybierz inny.";
				}
				
				
				
				
					if ($OK==true)
				{
					
					if ($polaczenie->query("INSERT INTO klienci VALUES (NULL, '$login','$haslo1','$email','$imie','$nazwisko','$miejscowosc','$kod_pocztowy','$ulica','$nr_mieszkania','$telefon' )"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: sklep.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				
					
				}
				
				$polaczenie->close();
			}

		}
		
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
		
	
		
		
		
		
	
	
		
	}	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Gameworld register</title>
	
	<link rel="Stylesheet" type="text/css" href="style.css" />
	
	
	
</head>

<body>

 <div id = "kontener">

		<a href = "index.php"><div id="baner">
		<h1>GameWorld.pl</h1>
		</div></a>
	
		<div id="lewy">
		
		<h3>Wypełnij dane, aby sie zarejstrować:</h3>
		
		<form method="post" name = "register">
	
		Login: <br /> <input type="text"  name="login" /><br />
		<?php
			if(isset($_SESSION['error_login']))
			{
				echo '<div class = "error">'.$_SESSION['error_login'].'</div>';
				unset($_SESSION['error_login']);
			}
		?>
		
		Hasło: <br /> <input type="password"  name="haslo1" /><br />
		
		<?php
			if(isset($_SESSION['error_haslo']))
			{
				echo '<div class = "error">'.$_SESSION['error_haslo'].'</div>';
				unset($_SESSION['error_haslo']);
			}
		?>
		
		
		
		Powtorz hasło <br /> <input type="password"  name="haslo2" /><br />
		
		E-mail: <br /> <input type="text"  name="email" /><br />
		<?php
			if(isset($_SESSION['error_email']))
			{
				echo '<div class = "error">'.$_SESSION['error_email'].'</div>';
				unset($_SESSION['error_email']);
			}
		?>
		
		Imie: <br /> <input type="text"  name="imie" /><br />
		
		<?php
			if(isset($_SESSION['error_imie']))
			{
				echo '<div class = "error">'.$_SESSION['error_imie'].'</div>';
				unset($_SESSION['error_imie']);
			}
		?>
		
		
		
		Nazwisko: <br /> <input type="text"  name="nazwisko" /><br />
		
		<?php
			if(isset($_SESSION['error_nazwisko']))
			{
				echo '<div class = "error">'.$_SESSION['error_nazwisko'].'</div>';
				unset($_SESSION['error_nazwisko']);
			}
		?>
		Miejscowość:  <br /> <input type="text"  name="miejscowosc" /><br />
		
		<?php
			if(isset($_SESSION['error_miejscowosc']))
			{
				echo '<div class = "error">'.$_SESSION['error_miejscowosc'].'</div>';
				unset($_SESSION['error_miejscowosc']);
			}
		?>
	
		Kod pocztowy: <br /> <input type="text"  name="kod_pocztowy" /><br />
		
		Ulica: <br /> <input type="text"  name="ulica" /><br />
		
		Nr mieszkania:  <br /> <input type="text"  name="nr_mieszkania" /><br />
		
		Telefon:  <br /> <input type="text"  name="telefon" /><br /><br /><br />
		
	
		
		
		
		
		
		
		<input type="submit" value="Zarejestruj się" />
		
	</form>
	
	

		
		</div>
	
		<div id="prawy">
		
		
		</div>
	
	
		<div id="stopka">
		
		<h6>Kontakt: info@gameworld.pl</h6>
		</div>
	</div>
	
	
	
	
	

</body>
</html>